<x-app-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 mt-5">
                        <div class="card">
                            <div class="card-header" style="font-weight: bold">Add Product
                                <a href="{{ route('orderdets.index', ['order' => $order]) }}">
                                    <x-primary-button>
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
                                <form action="{{ route('orderdets.store', $order) }}" method="POST">
                                    @csrf
                                    <div>
                                        @livewire('add-product-to-order')

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
