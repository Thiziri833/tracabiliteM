<x-app-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11 mt-5">
                    <div class="card">
                        <div class="card-header" style="font-weight: bold">Edit Order
                            <a href="{{ route('orders.index') }}">
                                <x-primary-button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Back') }}
                                </x-primary-button>
                            </a>
                        </div>
                        <div class="card-body">
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
                            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Purchase order number:</strong>
                                            <input type="number" name="numBC" value="{{ $order->numBC }}"
                                                class="form-control" placeholder="numBC">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Destination depot:</strong>
                                            <input type="text" name="depotdest" value="{{ $order->depotdest }}"
                                                class="form-control" placeholder="depotdest">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Date of the order:</strong>
                                            <input type="date" name="dateorder" value="{{ $order->dateorder }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Select Customer:</strong>
                                            <select name="customer_id" class="form-control">
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected':''}}>
                                                        {{ $customer->code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="py-2">
                                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                                            <x-primary-button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                {{ __('Submit') }}
                                            </x-primary-button>
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
