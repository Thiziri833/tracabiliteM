<x-app-layout>
    <div class="content-wrapper">
        <div class="container" style="width: 1000px">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Pallets List</div>
                        <div class="card-body">
                            <div class="py-2">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    @can('product-create')
                                    <a href="{{ route('pallets.create') }}">
                                        <x-primary-button
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            {{ __('Create New Pallet') }}
                                        </x-primary-button>
                                    </a>
                                @endcan
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <x-table.table :headers="['Action', 'No', 'NSSCC', 'DateFab', 'DLC','Dte Production','Equipe','quart','Structure','Line','product','lot']">
                                        @foreach ($pallets as $pallet)
                                            <tr class="border-b">
                                                <x-table.td>
                                                    <form action="{{ route('pallets.destroy', $pallet->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('pallets.show', $pallet->id) }}"><i
                                                                class="fa fa-eye" aria-hidden="true"></i></a>
                                                        {{-- @can('product-edit')
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('pallets.edit', $pallet->id) }}"><i
                                                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        @endcan --}}


                                                        @csrf
                                                        @method('DELETE')
                                                        @can('product-delete')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i></button>
                                                        @endcan
                                                    </form>
                                                </x-table.td>
                                                <x-table.td>{{ ++$i }}</x-table.td>
                                                <x-table.td>{{ $pallet->SSCC }}</x-table.td>
                                                <x-table.td>{{ $pallet->datefab }}</x-table.td>
                                                <x-table.td>{{ $pallet->DLC }}</x-table.td>
                                                {{-- <x-table.td>{{ $pallet->quantiteplt }}</x-table.td> --}}
                                                {{-- <x-table.td>{{ $pallet->product_id }}</x-table.td> --}}
                                                                                                {{-- <x-table.td>{{ $pallet->printing->production->structure->name}}</x-table.td> --}}

                                                 <x-table.td>{{ $pallet->printing->production->dateprod}}</x-table.td>
                                                 <x-table.td>{{ $pallet->printing->production->equipe}}</x-table.td>

                                                 <x-table.td>{{ $pallet->printing->production->quart}}</x-table.td>

                                                <x-table.td>{{ $pallet->printing->production->structure->name}}</x-table.td>
                                                <x-table.td>{{ $pallet->printing->production->line->name}}</x-table.td>
                                                <x-table.td>{{ $pallet->product->code}}</x-table.td>
                                                <x-table.td>{{ $pallet->printing->LOT}}</x-table.td>






                                            </tr>
                                        @endforeach
                                    </x-table.table>
                                </div>
                            </div>

                            {!! $pallets->links() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</x-app-layout>
