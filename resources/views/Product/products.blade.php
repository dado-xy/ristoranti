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
                                <div class="row">
                                    <a href="{{ route( 'product.edit', $product->id )}}"
                                       class="btn d-flex justify-content-center col">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                    </a>

                                    <button type="submit" form="delete-form{{ $product->id }}"
                                            class="btn d-flex justify-content-center col"
                                            onclick="return confirm('Procedere con l\'eliminazione?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="red"
                                             class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>
                                    <form id="delete-form{{ $product->id }}" method="post"
                                          action="{{ route('product.delete', $product->id) }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
    @else
        <p class="h5 p-4">
            {{__('Nessun prodotto..')}}
        </p>
    @endif
@endsection

@section('navigation')

    <li class="nav-item">
        <span class="navbar-brand mb-0 h1"> {{ __('Prodotti') }} </span>
    </li>

    <hr>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('product.create', $product->partner->id) }}">{{ __('Aggiungi Prodotto') }}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                 fill="blue" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link"
           href="{{ route('product.deleted') }}"> {{ __('Cestino') }}</a>
    </li>

@endsection
