@extends('layouts.app')

@section('content')
    <div class="card">
        @if($orders->count() > 0)
            <table class="table table-hover">

                <thead class="card-header">
                <tr>
                    <th scope="col">Order Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">User</th>
                </tr>
                </thead>

                <tbody>

                @foreach($orders as $order)
                    <tr class="clickable-row" id="{{ route('order.products', $order->id) }}">
                        <td>{{$order->id}}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->user->name .' '. $order->user->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
    @else
        <p class="h5 p-4">
            Nessun partner..
        </p>
    @endif

    <script>
        jQuery(document).ready(function () {
            $(".clickable-row").click(function (e) {
                window.location = $(e.target).parent()[0].id;
            });
        });
    </script>
@endsection

@section('navigation')

    <li class="nav-item">
        <span class="navbar-brand mb-0 h1"> {{ __('Ordini') }} </span>
    </li>

    <hr>

@endsection


