<x-app-layout>
    <div class="content-wrapper">
        <div class="container" style="width: 1000px">
            <div class="row justify-content-center">
                <div class="col-md-11 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Production List
                            @can('production-create')
                                <a href="{{ route('productions.create') }}">
                                    <x-primary-button
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Create') }}
                                    </x-primary-button>
                                </a>
                            @endcan
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="py-2">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <x-table.table :headers="['Action', 'No', 'Date', 'Equipe', 'Quart','Structure','Line','code']">
                                        @foreach ($productions as $production)
                                            <tr class="border-b">
                                                <x-table.td>
                                                    <form action="{{ route('productions.destroy', $production->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('productions.show', $production->id) }}"><i
                                                                class="fa fa-eye" aria-hidden="true"></i></a>

                                                        @can('production-edit')
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('productions.edit', $production->id) }}"><i
                                                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        @endcan

                                                        {{-- @can('product-print') --}}


                                                        {{-- <a class="btn btn-primary btn-sm" href="{{ route('printings.create', $production->id) }}">
                                                            <i class="fas fa-print" aria-hidden="true"></i>
                                                        </a> --}}

                                                         <a class="btn btn-primary btn-sm"
                                                            href="{{ route('printings.create', $production->id) }}">
                                                            <i class="fas fa-print" aria-hidden="true"></i>
                                                        </a>  
                                                        







                                                        {{-- @endcan --}}



                                                        @csrf
                                                        @method('DELETE')
                                                        @can('production-delete')
                                                            <x-danger-button
                                                                class="inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </x-danger-button>
                                                        @endcan
                                                    </form>
                                                </x-table.td>
                                                <x-table.td>{{ ++$i }}</x-table.td>
                                                <x-table.td>{{ $production->dateprod }}</x-table.td>
                                                <x-table.td>{{ $production->equipe }}</x-table.td>
                                                <x-table.td>{{ $production->quart }}</x-table.td>
                                                  {{-- <x-table.td>{{ $production->structure_id }}</x-table.td>   --}}
                                                  <x-table.td>{{ $production->structure->name }}</x-table.td> 
                                                 {{-- <x-table.td>{{ $production->line_id }}</x-table.td>  --}}
                                                 <x-table.td>{{ $production->line->name }}</x-table.td>   
                                                 <x-table.td>{{ $production->product->code }}</x-table.td>   

                                                 {{-- <x-table.td>{{ $production->product_id }}</x-table.td>   --}}



                                            </tr>
                                        @endforeach
                                    </x-table.table>
                                </div>
                            </div>

                            {!! $productions->links() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</x-app-layout>
