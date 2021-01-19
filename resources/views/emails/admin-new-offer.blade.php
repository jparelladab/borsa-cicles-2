@component('mail::message')

S'ha donat d'alta una nova oferta:<br>

# {{ $data['offer']->empresa()->company_name }} - {{ $data['offer']['title'] }}<br>

{{ config('app.name') }}
@endcomponent
