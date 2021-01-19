@component('mail::message')

Hola {{ $data['name'] }},<br>

Des de la Borsa de Cicles ICCIC et convidem a completar una breu enquesta que trobaràs al següent enllaç o al teu panell d'alumne.<br>

@component('mail::button', ['url' => route('survey.alumne.create') . '?role=2', 'color' => 'green'] )
Accedeix a l'enquesta
@endcomponent

Cordialment,<br>
{{ config('app.name') }}
@endcomponent
