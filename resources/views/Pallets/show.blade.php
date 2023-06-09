<x-app-layout>
    <div class="content-wrapper">
        <div class="container" style="width: 800px">
            <div class="row justify-content-center">
                <div class="col-8 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">
                            <a href="{{ route('pallets.index') }}">
                                <x-primary-button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-end">
                                    {{ __('Back') }}
                                </x-primary-button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group text-center">
                                        <div class="barcode-container d-inline-block">
                                            {!! $barcode !!}
                                        </div>
                                        {{ $pallet->SSCC }}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>SSCC:</strong>
                                        {{ $pallet->SSCC }}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>LOT:</strong>
                                        {{ $pallet->printing->LOT }}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>Code:</strong>
                                        {{ $pallet->product->code }}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>Date Fab:</strong>
                                        {{ $pallet->datefab }}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>Qte:</strong>
                                        {{ $pallet->printing->quantite }}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>DLUO:</strong>
                                        {{ $pallet->DLC }}
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
