@component('mail::message')

S'ha donat d'alta una nova empresa:<br>
# {{$data['empresa']['company_name']}}<br>

{{ config('app.name') }}
@endcomponent
