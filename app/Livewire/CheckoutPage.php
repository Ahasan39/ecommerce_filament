<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Mail\OrderPlaced;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Title;
use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;

#[Title('Checkout')]
class CheckoutPage extends Component
{
    public $first_name;
    public $last_name;
    public $phone;
    public $street_address;
    public $city;
    public $payment_method = 'cod';
    public $email;

    // Optional: You can adjust these or make them configurable via admin settings
    protected $shipping_cost = 0;
    protected $tax_rate = 0; // e.g. 0.05 for 5% tax

    public function mount()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();
        if (count($cart_items) == 0) {
            return redirect('/products');
        }

        if (auth()->check()) {
            $this->email = auth()->user()->email;
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'payment_method' => 'required|in:cod,stripe',
            // Email only required for Stripe payments
            'email' => $this->payment_method === 'stripe' ? 'required|email' : 'nullable|email',
        ]);

        $cart_items = CartManagement::getCartItemsFromCookie();

        // Calculate totals
        $totals = CartManagement::calculateFinalTotal($cart_items, $this->shipping_cost, $this->tax_rate);

        // Prepare Stripe line items
        $line_items = [];
        foreach ($cart_items as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'BDT',
                    'unit_amount' => $item['unit_amount'] * 100,
                    'product_data' => ['name' => $item['name']],
                ],
                'quantity' => $item['quantity'],
            ];
        }

        // Add shipping as a separate line item in Stripe if payment method is stripe
        if ($this->payment_method === 'stripe' && $this->shipping_cost > 0) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'BDT',
                    'unit_amount' => $this->shipping_cost * 100,
                    'product_data' => ['name' => 'Shipping'],
                ],
                'quantity' => 1,
            ];
        }

        $order = new Order();
        $order->user_id = auth()->check() ? auth()->user()->id : null;
        $order->shipping_amount = $totals['shipping'];  // Save shipping
        $order->grand_total = $totals['grand_total'];  // Save grand total
        $order->payment_method = $this->payment_method;
        $order->payment_status = 'pending';
        $order->status = 'new';
        $order->currency = 'BDT';
        $order->shipping_method = 'COD'; // You can expand this if needed
        $order->notes = 'Order placed by ' . ($order->user_id ? auth()->user()->name : 'Guest');
        $order->save();

        $address = new Address();
        $address->first_name = $this->first_name;
        $address->last_name = $this->last_name;
        $address->phone = $this->phone;
        $address->street_address = $this->street_address;
        $address->city = $this->city;
        $address->order_id = $order->id;
        $address->save();

        $order->items()->createMany($cart_items);
        CartManagement::clearCartItems();

        if ($this->email) {
            Mail::to($this->email)->send(new OrderPlaced($order));
        }

        if ($this->payment_method === 'stripe') {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $sessionCheckout = Session::create([
                'payment_method_types' => ['card'],
                'customer_email' => $this->email,
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('cancel'),
            ]);

            return redirect($sessionCheckout->url);
        } else {
            return redirect(route('success') . '?order_id=' . $order->id);
        }
    }

    public function render()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();

        // Use calculateFinalTotal here to get subtotal, tax, shipping, grand total
        $totals = CartManagement::calculateFinalTotal($cart_items, $this->shipping_cost, $this->tax_rate);

        return view('livewire.checkout-page', [
            'cart_items' => $cart_items,
            'subtotal' => $totals['subtotal'],
            'tax' => $totals['tax'],
            'shipping' => $totals['shipping'],
            'grand_total' => $totals['grand_total'],
        ]);
    }
}
