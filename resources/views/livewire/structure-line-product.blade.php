<div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Structures:</strong>
            <select wire:model="selectedStructure" class="form-control" name="structure_id">
                <option value="" selected>Choose Structure</option>
                @foreach($structures as $structure)
                    <option value="{{ $structure->id }}">{{ $structure->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
     

    @if (!is_null($selectedStructure))
        {{-- <div class="form-group row">
            <label for="line" class="col-md-4 col-form-label text-md-right">{{ __('Line') }}</label>

            <div class="col-md-6">
                <select wire:model="selectedLine" class="form-control" name="line_id">
                    <option value="" selected>Choose line</option>
                    @foreach($lines as $line)
                        <option value="{{ $line->id }}">{{ $line->name }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lines:</strong>
                <select wire:model="selectedLine" class="form-control" name="line_id">
                    <option value="" selected>Choose Line</option>
                    @foreach($lines as $line)
                        <option value="{{ $line->id }}">{{ $line->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    @if (!is_null($selectedLine))
        {{-- <div class="form-group row">
            <label for="product" class="col-md-4 col-form-label text-md-right">{{ __('Product') }}</label>

            <div class="col-md-6">
                <select wire:model="selectedProduct" class="form-control" name="product_id">
                    <option value="" selected>Choose product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->code }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Products:</strong>
                <select wire:model="selectedProduct" class="form-control" name="product_id">
                    <option value="" selected>Choose Product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->code }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>