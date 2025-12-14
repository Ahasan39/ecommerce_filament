<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;

#[Title('Success - Khadyobitan')]
class SuccessPage extends Component
{
    #[Url]
    public $session_id;

    public function render()
    {
        // অর্ডার খুঁজে বের করুন
        $latest_order = auth()->check()
            ? Order::with('address', 'user', 'items')->where('user_id', auth()->id())->latest()->first()
            : Order::with('address', 'items')->whereNull('user_id')->latest()->first();

        // যদি Stripe Session ID থাকে তাহলে যাচাই করুন পেমেন্ট স্ট্যাটাস
        if ($this->session_id && $latest_order) {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $session_info = Session::retrieve($this->session_id);

            if ($session_info->payment_status !== 'paid') {
                $latest_order->payment_status = 'failed';
                $latest_order->save();
                return redirect()->route('cancel');
            }

            if ($latest_order->payment_status !== 'paid') {
                $latest_order->payment_status = 'paid';
                $latest_order->save();
            }
        }

        $message = $latest_order && $latest_order->user_id
            ? 'Order Placed Successfully by ' . $latest_order->user->name
            : 'Guest Order Placed Successfully';

        // Saved totals or fallback to calculation
        $subtotal = $latest_order->subtotal ?? $latest_order->items->sum(function ($item) {
            return $item->unit_amount * $item->quantity;
        });

        $tax = $latest_order->tax_amount ?? 0;
        $shipping = $latest_order->shipping_amount ?? 0;
        $discount = $latest_order->discount ?? 0;
        $grand_total = $latest_order->grand_total ?? ($subtotal + $tax + $shipping - $discount);

        return view('livewire.success-page', [
            'order' => $latest_order,
            'message' => $message,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping' => $shipping,
            'discount' => $discount,
            'grand_total' => $grand_total,
        ]);
    }
}
