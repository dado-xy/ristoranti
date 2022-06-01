@component('mail::message')
# Caro {{ $user->name }},

L'ordine numero {{ $order->id }} in data {{ $order->created_at}} é stato confermato,

Thanks,<br>
{{ config('app.name') }}
@endcomponent
