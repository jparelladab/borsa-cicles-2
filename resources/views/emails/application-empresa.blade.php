@component('mail::message')

Hola {{ $data['name'] }},

Un candidat de la Borsa ICCIC s'ha inscrit a la teva oferta:

# {{ $data['offer_title'] }}

Trobaràs els detalls de la candidatura al panell d'empresa de la Borsa de l'ICCIC.


Gràcies,<br>
{{ config('app.name') }}
@endcomponent