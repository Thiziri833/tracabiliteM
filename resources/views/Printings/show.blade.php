<x-app-layout>
    <div class="content-wrapper">
        {{-- <a href="{{ route('printings.index') }}">
            <x-primary-button
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Back') }}
            </x-primary-button>
        </a> --}}
        <div class="container" style="width: 800px">

            <div class="row">

                <div class="col-md-6 mt-5">

                    <div class="card">

                        <div class="card-header" style="font-weight: bold">{{ __('Show Printing') }}</div>

                        <div class="card-body">
                            <div class="py-2">
                                {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <a href="{{ route('printings.index') }}">
                                        <x-primary-button
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            {{ __('Back') }}
                                        </x-primary-button>
                                    </a>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Quantite:</strong>
                                        <input type="text" id="quantite" name="quantite" class="form-control"
                                            style="width: 300px" value=" {{ $printing->quantite }}" disabled>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Date impression:</strong>
                                        <input type="text" id="date_inst" name="date_inst" class="form-control"
                                            style="width: 300px" value=" {{ $printing->date_inst }}" disabled>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">{{ __('Show Production') }}</div>
                        <div class="card-body">
                            {{-- <div class="py-2">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <a href="{{ route('printings.index') }}">
                                        <x-primary-button
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            {{ __('Back') }}
                                        </x-primary-button>
                                    </a>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Date production:</strong>
                                        <input type="text" id="dateprod" name="dateprod" class="form-control"
                                            style="width: 300px" value=" {{ $printing->production->dateprod }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Equipe:</strong>
                                        <input type="text" id="equipe" name="equipe" class="form-control"
                                            style="width: 300px" value=" {{ $printing->production->equipe }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Quart:</strong>
                                        <input type="text" id="quart" name="quart" class="form-control"
                                            style="width: 300px" value=" {{ $printing->production->quart }}" disabled>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="font-weight: bold">Pallets List

                                <a href="{{ route('productions.create', $production) }}">
                                    <x-primary-button
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-end">
                                        {{ __('Create') }}
                                    </x-primary-button>
                                </a>

                            </div>
                            <div class="card-body">
                                <div class="py-2">
                                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>No</th>
                                                    <th>NSSCC</th>
                                                    <th>datefab</th>
                                                    <th>DLC</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pallets as $pallet)
                                                    <tr>
                                                        <td>
                                                            <form action="{{ route('printings.destroy', $pallet->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-info btn-sm"
                                                                    href="{{ route('printings.show', $pallet->id) }}"><i
                                                                        class="fa fa-eye" aria-hidden="true"></i></a>

                                                                <a class="btn btn-primary btn-sm"
                                                                    href="{{ route('printings.edit', $pallet->id) }}"><i
                                                                        class="fa fa-pencil" aria-hidden="true"></i></a>



                                                                @csrf
                                                                @method('DELETE')

                                                                <x-danger-button
                                                                    class="inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </x-danger-button>

                                                            </form>
                                                        </td>
                                                        <td>{{ $pallet->id }}</td>
                                                        <td>{{ $pallet->SSCC }}</td>
                                                        <td>{{ $pallet->datefab }}</td>
                                                        <td>{{ $pallet->DLC }}</td>


                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
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
