@component('mail::message')

Hola {{ $data['name'] }},<br>

S'ha publicat una nova oferta que et pot interessar:<br>

# {{ $data['offer']->empresa()->company_name }} - {{ $data['offer']['title'] }}<br>

Cordialment,<br>
{{ config('app.name') }}
@endcomponent
