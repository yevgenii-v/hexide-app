<?php

namespace App\Http\Livewire\orders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use function view;

class Edit extends Component
{
    public Order $order;
    public $page;
    public $statuses = [Order::STATUS_OPENED, Order::STATUS_CLOSED, Order::STATUS_CANCELED];

    public function mount($page)
    {
        $this->page = $page;
    }

    public function delete(Order $order, Product $product)
    {
        $order->products()->detach($product);

        return redirect($this->page);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.orders.edit');
    }
}
