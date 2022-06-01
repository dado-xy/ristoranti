@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if($partners->count() > 0)
                @foreach($partners as $partner)
                    <div class="col-sm-6 mt-4 d-flex justify-content-center">
                        <div class="card" style="width: 50%;">
                            <img class="card-img-top" src="{{ asset($partner->image) }}" alt="Card image cap">
                            <div class="card-body">

                                <h5 class="card-title col">{{ $partner->title }}</h5>
                                <div class="d-flex justify-content-center">
                                    <a onclick="return confirm('Sicuro di voler riattivare questo Partner?')"
                                       href="{{ route('partner.restore', [$partner->id] ) }}"
                                       class="btn d-flex justify-content-center col">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="red" class="bi bi-arrow-right-square-fill"
                                             viewBox="0 0 16 16">
                                            <path
                                                d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
    @else
        <h5 class="p-4">
            Nessun partner eliminato..
        </h5>
    @endif
@endsection

@section('navigation')

    <li class="nav-item">
        <span class="navbar-brand mb-0 h1"> {{ __('Partner') }} </span>
    </li>

    <hr>

    <li class="nav-item">
        <a class="nav-link"
           href="{{ route('partner.create') }}"> {{ __('Aggiungi Partner') }}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                 fill="blue" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link"
           href="{{ route('partner.deleted') }}"> {{ __('Cestino') }}</a>
    </li>

@endsection
