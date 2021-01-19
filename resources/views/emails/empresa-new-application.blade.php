@component('mail::message')

Hola {{ $data['name'] }},<br>

La teva oferta <span style="text-decoration: underline;font-weight: bold;">{{ $data['offer']->title }}</span> ha rebut una nova candidatura.<br>

Cordialment,<br>
{{ config('app.name') }}
@endcomponent
