<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use JetBrains\PhpStorm\Pure;

class OrderController extends Controller
{
    /* @var \App\Models\User */
    protected $user;

    public function __construct()
    {
        $this->user = auth('sanctum')->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return OrderResource::collection(Order::where('user_id', $this->user->id)->paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderStoreRequest $request
     * @return JsonResponse
     */
    public function store(OrderStoreRequest $request): JsonResponse
    {
        $data = $request->validated();

        $order = Order::create([
            'user_id'           => $this->user->id,
            'receiver_address'  => $data['receiver_address'],
        ]);

        foreach ($data['orderProducts'] as $product)
        {
            $order->products()->attach($product['product_id'],
                ['quantity' => $product['quantity']]);
        }

        return response()->json(['message' => 'New order was created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return OrderResource
     */
    #[Pure]
    public function show(Order $order): OrderResource
    {
        if ($this->user->id !== $order->user_id)
        {
            return abort(404);
        }

        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Order $order
     * @return Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
