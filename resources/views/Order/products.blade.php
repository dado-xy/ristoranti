@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if($products->count() > 0)
                @foreach($products as $product)
                    <div class="col-sm-6 mt-4 d-flex justify-content-center">
                        <div class="card" style="width: 50%;">
                            <img class="card-img-top" src="{{ asset($product->image) }}" alt="Card image cap">
                            <div class="card-body">
                                <div class="row">
                                    <div class="h5 col">{{$product->title}}</div>
                                    <div class="h5 col-sm-4">{{$product->price . "$"}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
    @else
        <p class="h5">
            {{__('Nessun prodotto..')}}
        </p>
    @endif
@endsection

@section('navigation')

    <li class="nav-item">
        <span class="navbar-brand mb-0 h1"> {{ __('Dettaglio Ordine') }} </span>
    </li>
@endsection
