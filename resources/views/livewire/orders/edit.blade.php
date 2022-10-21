<div>
    <form action="{{ route('admin.orders.update', [app()->getLocale(), $order]) }}" method="POST">
    @csrf
    @method('PATCH')
        <ul>
            <li>{{ __('admin/users.name').': '.$order->user->name }}</li>
            <li><span>Email: </span>{{ $order->user->email }}</li>
            <li>
                <div class="w-50">
                    <input type="text"
                           name="receiver_address"
                           class="form-control"
                           value="{{ $order->receiver_address }}"
                    >
                </div>
            </li>
            <li>
                <select class="form-control w-50" name="status">
                    @foreach($statuses as $status)
                        <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}> {{ __('admin/orders.'.$status) }} </option>
                    @endforeach
                </select>
            </li>
        </ul>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>{{ __('admin/products.product_id') }}</th>
            <th>{{ __('admin/products.title') }}</th>
            <th>{{ __('admin/products.quantity') }}</th>
            <th>{{ __('admin/products.price_per') }}</th>
            <th>{{ __('admin/products.total') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>
                        <input type="number"
                               name="quantity[{{ $product->id }}]"
                               value="{{ $product->pivot->quantity }}"
                        >
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->price * $product->pivot->quantity}}</td>
                    <td>
                        <button wire:click="delete({{ $order->id }}, '{{ $product->id }}')"
                                class="btn btn-danger"
                                title="{{ __('admin/buttons.delete') }}"
                                onclick="return confirm('Ви впевнені, що хотете видалити цей товар?')"
                        >
                            <i class="fas fa-solid fa-trash"></i>
                        </button>
                    </td>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <button type="submit" class=" align-end btn btn-primary">{{ __('admin/buttons.update') }}</button>
    </form>
</div>
