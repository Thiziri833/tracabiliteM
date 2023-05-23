<div class="content-wrapper">
    <div class="container" style="width: 800px">
        <div class="row justify-content-center">
            <div class="col-md-11 mt-5">
                <div class="card">
                     <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group text-center">
                                    <div class="barcode-container d-inline-block">
                                        {!! $barcode !!}
                                    </div>
                                    {{ $pallet->SSCC }}
                                </div>
                            </div> <br>
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>SSCC:</strong>
                                    {{ $pallet->SSCC }}<br>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>LOT:</strong>
                                    {{ $pallet->printing->LOT }}<br>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Code:</strong>
                                    {{ $pallet->product->code }}<br>
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

