<div>
        <div class="card">
            <div class="card-header">
                Products
            </div>

            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                        <tr>
                            <th>Product:</th>
                            <th>Quantity:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderProducts as $index => $orderProduct)
                            <tr>
                                <td>
                                    <select name="orderProducts[{{ $index }}][product_id]"
                                        wire:model="orderProducts.{{ $index }}.product_id" class="form-control"
                                        style="width: 200px">
                                        <option value="">-- choose product --</option>
                                        @foreach ($allProducts as $product)
                                            <option value="{{ $product->id }}">
                                                {{ $product->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="orderProducts[{{ $index }}][quantity]"
                                        class="form-control" wire:model="orderProducts.{{ $index }}.quantity" />
                                </td>
                                <td>
                                    <button class="btn btn-danger"
                                        wire:click.prevent="removeProduct({{ $index }})"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <x-primary-button
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" wire:click.prevent="addProduct">
                                        {{ __('+ Add Another Product') }}
                                    </x-primary-button>
                        {{-- <button class="btn btn-sm btn-secondary" wire:click.prevent="addProduct">+ Add Another
                            Product</button> --}}
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div>

            <input class="btn btn-primary" type="submit" value="Save Product">
        </div>

    {{-- </form> --}}
</div>
