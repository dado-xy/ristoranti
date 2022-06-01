@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">{{_('Aggiungi Dati Prodotto')}}</div>
            <div class="card-body">
                @error('title', 'image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="partner_id" value="{{ $partner_id }}">

                    <div class="row mb-3">
                        <label for="title"
                               class="col-md-4 col-form-label text-md-end">{{ __('Titolo') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text"
                                   class="form-control" name="title"
                                   value="{{ old('title') }}" required autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price"
                               class="col-md-4 col-form-label text-md-end">{{ __('Prezzo') }}</label>

                        <div class="col-md-6">
                            <input id="price" type="number" min="0"
                                   class="form-control" name="price"
                                   value="{{ old('price') }}" required autofocus>

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="title"
                               class="col-md-4 col-form-label text-md-end">{{ __('Immagine') }}</label>

                        <div class="col-md-6">
                            <input id="image" type="file"
                                   class="form-control" name="image"
                                   value="{{ old('image') }}" required autofocus>

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Salva') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('navigation')

    <li class="nav-item">
        <span class="navbar-brand mb-0 h1"> {{ __('Prodotti') }} </span>
    </li>

    <hr>

@endsection

