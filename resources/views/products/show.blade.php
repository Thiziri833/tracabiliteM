<x-app-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Show Product
                            <a href="{{ route('products.index') }}">
                                <x-primary-button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Back') }}
                                </x-primary-button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Code:</strong>
                                        <input type="text" id="code" name="code" class="form-control"
                                            style="width: 300px" value="{{ $product->code }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Description:</strong>
                                        <input type="text" id="description" name="description" class="form-control"
                                            style="width: 300px" value="{{ $product->description }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>DLUO:</strong>
                                        <input type="number" id="DLUO" name="DLUO" class="form-control"
                                            style="width: 300px" value="{{ $product->DLUO }}" disabled>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
