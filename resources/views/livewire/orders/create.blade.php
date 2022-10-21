<div>
    <form action="{{ route('admin.orders.store') }}" method="POST">
    @csrf
        <select name="user_id"
                class="form-control">
            <option value="">-- {{ __('admin/orders.user.select') }} --</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->name }}, ({{ $user->email }})
                </option>
            @endforeach
        </select>
        <br>
        <input type="text"
               name="receiver_address"
               class="form-control"
               placeholder="{{ __('admin/orders.receiver_address') }}">
        <br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('admin/orders.products.list') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                    <tr>
                        <th>{{ __('admin/orders.product') }}</th>
                        <th>{{ __('admin/products.quantity') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orderProducts as $index => $orderProduct)
                        <tr>
                            <td>
                                <select name="orderProducts[{{ $index }}][product_id]"
                                        wire:model="orderProducts.{{$index}}.product_id"
                                        class="form-control">
                                    <option value="">-- {{ __('admin/orders.product.select') }} --</option>
                                    @foreach ($allProducts as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->{'title_'.app()->getLocale()} }} ( {{ $product->price }}₴)
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number"
                                       name="orderProducts[{{$index}}][quantity]"
                                       class="form-control"
                                       wire:model="orderProducts.{{$index}}.quantity"
                                       value="{{ $orderProduct['quantity'] }}"
                                />
                            </td>
                            <td>
                                <button class="btn btn-danger"
                                        wire:click.prevent="removeProduct({{ $index }})">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary" wire:click.prevent="addProduct">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <br />
        <div>
            <input class="btn btn-primary" type="submit" value="{{ __('admin/buttons.create') }}">
        </div>
    </form>
</div>
