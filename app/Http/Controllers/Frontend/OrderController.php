<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class OrderController extends Controller
{
    /**
     * Display a listing of the Orders.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $orders = Order::paginate(25);

        return view('admin.orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param OrderStoreRequest $request
     * @return RedirectResponse
     */
    public function store(OrderStoreRequest $request)
    {
        $data = $request->validated();

        $order = Order::create([
            'user_id'           => $data['user_id'],
            'receiver_address'  => $data['receiver_address'],
        ]);

        foreach ($data['orderProducts'] as $product)
        {
            $order->products()->attach($product['product_id'],
                ['quantity' => $product['quantity']]);
        }

        return redirect()->route('admin.orders.edit', $order->id);
    }

    /**
     * Display the specified Order.
     *
     * @param Order $order
     * @return Application|Factory|View
     */
    public function show(Order $order): View|Factory|Application
    {
        $productList = $order->products;

        return view('admin.orders.show', [
            'order' => $order,
            'productList' => $productList,
        ]);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param Order $order
     * @return Application|Factory|View
     */
    public function edit(Order $order): View|Factory|Application
    {
        return view('admin.orders.edit')->withOrder($order);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param OrderUpdateRequest $request
     * @param Order $order
     * @return RedirectResponse
     */
    public function update(OrderUpdateRequest $request, Order $order): RedirectResponse
    {
        $data = $request->validated();

        $order->fill($data)->save();

        $products = collect($request->input('quantity', []))
            ->map(function ($product) {
                return ['quantity' => $product];
            });

        $order->products()->sync($products);

        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param Order $order
     * @return RedirectResponse
     */
    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->route('admin.orders.index');
    }
}
