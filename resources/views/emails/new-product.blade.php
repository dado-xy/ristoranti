@component('mail::message')
# Carto {{ $name }},

Il nostro partner {{ $title }} ha aggiunto un nuovo prodotto corri a vedere,

A presto,<br>
{{ config('app.name') }}
@endcomponent
