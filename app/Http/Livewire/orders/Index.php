<?php

namespace App\Http\Livewire\orders;

use App\Models\Order;
use Livewire\Component;
use function view;

class Index extends Component
{
    public $order;

    public function destroy(Order $order)
    {
        $order->delete();
    }

    public function render()
    {
        $orders = Order::paginate(25);

        return view('livewire.orders', [
            'orders' => $orders,
        ]);
    }
}
