@component('mail::message')

Hola {{ $data['name'] }},<br>

Des de la Borsa de Cicles ICCIC et convidem a completar una breu enquesta que trobaràs al teu panell d'empresa.<br>

@component('mail::button', ['url' => route('survey.empresa.create') . '?role=3'] )
Accedeix a l'enquesta
@endcomponent

Cordialment,<br>
{{ config('app.name') }}
@endcomponent
