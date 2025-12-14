<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class MyOrdersPage extends Component
{
    use WithPagination;

    public function render()
    {
        $orders = Order::with(['orderItems.product', 'address'])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10); // Pagination enabled

        return view('livewire.my-orders-page', [
            'orders' => $orders,
        ]);
    }
}
