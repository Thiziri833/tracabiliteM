<x-app-layout>
    <div class="content-wrapper">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Add New Product') }}
        </h2> --}}
        <div class="container" style="width: 800px">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">{{ __('Add New Pallet') }}</div>

                        <div class="card-body">
                            <div class="py-2">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <a href="{{ route('pallets.index') }}">
                                        <x-primary-button
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            {{ __('Back') }}
                                        </x-primary-button>
                                    </a>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> Something went wrong.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('pallets.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Date Fab:</strong>
                                            <input type="text" name="datefab" class="form-control" value="{{ old('date', $currentDate) }}">

                                        </div>
                                    </div>
                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="DLC">DLC:</label>
                                            <input type="text" name="DLC" id="DLC" class="form-control" value="{{$datedluo}}" required>
                                        </div>
                                    </div> 
                                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Quantite Plt:</strong>
                                            <input type="number" name="quantiteplt" class="form-control"
                                                placeholder="quart">
                                        </div>
                                    </div> --}}
                                    
                                     <div class="form-group hidden">
                                        <label for="product_id">Product:</label>
                                        <select name="product_id" id="product_id" class="form-control" onchange="this.form.submit()">
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}" @if($product->id === $selectedProduct->id) selected @endif>{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>  

                                    {{-- <label for="priting_id">Impression:</label>
                                    <select name="priting_id" id="priting_id" required>
                                        @foreach ($printings as $printing)
                                            <option value="{{ $printing->id }}">{{ $printing->printing_id }}</option>
                                        @endforeach
                                    </select>   --}}
    <label for="production_id">Production</label>
  <select id="production_id" name="production_id" required>
    @foreach ($productions as $production)
      <option value="{{ $production->id }}"> 
          {{ $production->dateprod }}  
         {{ $production->product->equipe }}  
         {{ $production->product->code }}  

        </option>
    @endforeach
  </select>   


                                     <div class="py-2">
                                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                                            <x-primary-button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                {{ __('Submit') }}
                                            </x-primary-button>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const productIdField = document.getElementById('product_id');
                                        const dluoField = document.getElementById('dluo');
                                
                                        productIdField.addEventListener('change', function() {
                                            const productId = this.value;
                                            fetch(`/products/${productId}`)
                                                .then(response => response.json())
                                                .then(product => {
                                                    const dluo = product.DLUO;
                                                    const currentDate = new Date();
                                                    const dlcDate = new Date(currentDate.getTime() + (dluo * 24 * 60 * 60 * 1000));
                                                    const dlc = dlcDate.toISOString().slice(0, 10);
                                                    dluoField.value = dluo;
                                                    document.getElementById('DLC').value = dlc;
                                                });
                                        });
                                    });
                                </script>
                                

                            </form>

                            <form method="GET" action="{{ route('pallets.create') }}">
                                <div class="form-group">
                                    <label for="product_id">Product:</label>
                                    <select name="product_id" id="product_id" class="form-control" onchange="this.form.submit()">
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}" @if($product->id === $selectedProduct->id) selected @endif>{{ $product->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                            
                                                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
