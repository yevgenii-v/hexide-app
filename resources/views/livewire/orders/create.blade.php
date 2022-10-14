<div>
    <form action="{{ route('admin.orders.store') }}" method="POST">
    @csrf
        <select name="user_id"
                class="form-control">
            <option value="">-- {{ __('Виберіть користувача') }} --</option>
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
               placeholder="{{ __('Адреса одержувача') }}">
        <br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Список товарів') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
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
                                    <option value="">-- {{ __('Виберіть продукт') }} --</option>
                                    @foreach ($allProducts as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->title }} ( {{ $product->price }}₴)
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
            <input class="btn btn-primary" type="submit" value="Save Order">
        </div>
    </form>
</div>
