@component('mail::message')

Un alumne ha completat una enquesta:<br>

# Dades alumne<br>

<div><span style="color:#36AE92;font-weight:bold; font-weight:bold;">Nom:</span> {{ $data['alumne']->fullName() }}</div>
<div><span style="color:#36AE92;font-weight:bold; font-weight:bold;">Estudis:</span>@if($data['alumne']->studies()->count() === 1) {{ $data['alumne']->studies()->first()->title }}@else
@foreach ($data['alumne']->studies as $study)
 {{ $study->title }}, 
@endforeach
@endif


</div>

<br>

# Enquesta<br>

<div style="color:#36AE92;font-weight:bold; font-weight:bold;">El procediment a seguir a l’hora d’inscriure’m a les ofertes de la Borsa de Treball m’ha semblat adequat:</div>
<div>{{ $data['survey-alumne']->Q1_num }}</div>

<div style="color:#36AE92;font-weight:bold;">Observacions</div>
<div>{{ $data['survey-alumne']->Q1_text }}</div>

<br>

<div style="color:#36AE92;font-weight:bold;">Les ofertes de la Borsa de Treball s’adeqüen als meus interessos professionals:</div>
<div>{{ $data['survey-alumne']->Q2_num }}</div>

<div style="color:#36AE92;font-weight:bold;">Observacions</div>
<div>{{ $data['survey-alumne']->Q2_text }}</div>

<br>

<div style="color:#36AE92;font-weight:bold;">Quan m’inscric a una oferta laboral, encara que no hagi estat seleccionat/da, normalment rebo una resposta de l’empresa:</div>
<div>{{ $data['survey-alumne']->Q3_num }}</div>

<div style="color:#36AE92;font-weight:bold;">Observacions</div>
<div>{{ $data['survey-alumne']->Q3_text }}</div>

<br>

<div style="color:#36AE92;font-weight:bold;">La formació i la titulació professional adquirida al CIC - ELISAVA Cicles formatius m’ha preparat per trobar feina al sector:</div>
<div>{{ $data['survey-alumne']->Q4_num }}</div>

<div style="color:#36AE92;font-weight:bold;">Observacions</div>
<div>{{ $data['survey-alumne']->Q4_text }}</div>

<br>

<div style="color:#36AE92;font-weight:bold;">Si tens alguna aportació per millorar la nostra borsa de treball serà una oportunitat per nosaltres escoltar-la:</div>
<div>{{ $data['survey-alumne']->Q5 }}</div>

<br>

{{ config('app.name') }}
@endcomponent
