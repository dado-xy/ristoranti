@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">{{_('Aggiungi Partner')}}</div>
            <div class="card-body">
                @error('title', 'image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <form action="{{ route('partner.update', $partner->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-3">
                        <label for="title"
                               class="col-md-4 col-form-label text-md-end">{{ __('Titolo') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text"
                                   class="form-control" name="title"
                                   value="{{ $partner->title }}"
                                   required autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image"
                               class="col-md-4 col-form-label text-md-end">{{ __('Immagine') }}</label>

                        <div class="col-md-6">
                            <input id="image" type="file"
                                   class="form-control" name="image"
                                   value={{ asset($partner->image) }} autofocus>

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

