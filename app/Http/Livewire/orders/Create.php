<?php

namespace App\Http\Livewire\Orders;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $users = [];
    public $orderProducts = [];
    public $allProducts = [];

    public function mount()
    {
        $this->users = User::all();
        $this->allProducts = Product::all();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1]
        ];
    }

    public function addProduct()
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        array_values($this->orderProducts);
    }

    public function render()
    {
        $products = Product::paginate(10);

        return view('livewire.orders.create')->withProduct($products);
    }
}
