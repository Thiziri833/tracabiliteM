<x-app-layout>
    <div class="content-wrapper">
        <div class="container" style="width: 1000px">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Pallets List</div>
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="table-responsive    ">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>N°SSCC</th>
                                                <th>Date Fabrication</th>
                                                <th>DLC</th>
                                                <th>Date Production</th>
                                                <th>Equipe</th>
                                                <th>Quart</th>
                                                <th>Structure</th>
                                                <th>Line</th>
                                                <th>Product</th>
                                                <th>LOT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pallets as $pallet)
                                                <tr>
                                                    <td>
                                                        <form action="{{ route('pallets.destroy', $pallet->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-info btn-sm"
                                                                href="{{ route('pallets.show', $pallet->id) }}"><i
                                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('pallets.exportPDF', $pallet->id) }}">
                                                                <i class="fas fa-print"></i>
                                                            </a>


                                                            @csrf
                                                            @method('DELETE')
                                                            @can('pallet-delete')
                                                                <x-danger-button
                                                                    class="inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </x-danger-button>
                                                                {{-- <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button> --}}
                                                            @endcan
                                                        </form>
                                                    </td>
                                                    <td>{{ $pallet->SSCC }}</td>
                                                    <td>{{ $pallet->datefab }}</td>
                                                    <td>{{ $pallet->DLC }}</td>
                                                    <td>{{ $pallet->printing->production->dateprod }}</td>
                                                    <td>{{ $pallet->printing->production->equipe }}</td>
                                                    <td>{{ $pallet->printing->production->quart }}</td>
                                                    <td>{{ $pallet->printing->production->structure->name }}</td>
                                                    <td>{{ $pallet->printing->production->line->name }}</td>
                                                    <td>{{ $pallet->product->code }}</td>
                                                    <td>{{ $pallet->printing->LOT }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
