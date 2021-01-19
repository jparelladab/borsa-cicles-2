@component('mail::message')

Hola {{ $data['name'] }},<br>

Benvingut a la borsa de treball del ICCIC. Per completar el procés de registre clica el següent enllaç per confirmar la teva adreça.<br>
<br>
Per a qualsevol aclariment, pots contactar amb la Maria Serra: mserra@iccic.edu<br>
Tel. 932001133<br>

@component('mail::button', ['url' => route('empreses.verify') . '?code=' . $data['verification_code'] ])
Confirma adreça de correu
@endcomponent

Gràcies,<br>
{{ config('app.name') }}
@endcomponent
