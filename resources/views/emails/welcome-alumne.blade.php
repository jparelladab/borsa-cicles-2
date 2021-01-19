@component('mail::message')

Hola {{ $data['name'] }},<br>

Benvingut a la borsa de treball de l'ICCIC. Per completar el procés de registre clica el següent enllaç per confirmar la teva adreça.<br>
<br>
Amb el teu email i la clau de pas que hagis creat podràs accedir a la teva zona privada sempre que vulguis i així podràs visualitzar les ofertes laborals relacionades amb els teus estudis.<br>
<br>
Per a qualsevol aclariment, pots contactar amb la Maria Serra: mserra@iccic.edu<br>
Tel. 932001133<br>

@component('mail::button', ['url' => route('alumnes.verify') . '?code=' . $data['verification_code']])
Confirma adreça de correu
@endcomponent

Cordialment,<br>
{{ config('app.name') }}
@endcomponent
