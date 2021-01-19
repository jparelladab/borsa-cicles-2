@component('mail::message')

S'ha donat d'alta un nou alumne<br>
# {{ $data['alumne']->fullName() }}<br>

{{ config('app.name') }}
@endcomponent
