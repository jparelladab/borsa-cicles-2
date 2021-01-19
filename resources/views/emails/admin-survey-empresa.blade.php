@component('mail::message')

Una empresa ha completat una enquesta:<br>

# Dades Empresa

<div>{{ $data['empresa']->company_name }}</div>

<br>

# Enquesta<br>


<div style="color:#36AE92;font-weight:bold; font-weight:bold;"> Algun/a dels nostres graduats/des ha estat seleccionat/da per cobrir la vostra oferta laboral?</div>
<div>{{ $data['survey-empresa']->Q1 }}</div>

<br>

<div style="color:#36AE92;font-weight:bold;">En el cas de que no hagi estat seleccionat/da, si us plau valoreu en una escala de l’1 al 4 el perfil de/la candidat/a:</div>
<div>{{ $data['survey-empresa']->Q2_num }}</div>

<div style="color:#36AE92;font-weight:bold;">Observacions</div>
<div>{{ $data['survey-empresa']->Q2_text }}</div>

<br>

<div style="color:#36AE92;font-weight:bold;">Puntueu si us plau de l’1 al 4 en cada un d’aquests aspectes la importància que li doneu quan seleccioneu un/a candidat/a, sent 1 gens important i 4 molt important:</div>

<div style="color:#36AE92;font-weight:bold;">Nivell de coneixements: <span style="color:#718096;;font-weight:normal;">{{ $data['survey-empresa']->Q3_Coneixements }}</span></div>


<div style="color:#36AE92;font-weight:bold;">Experiència: <span style="color:#718096;;font-weight:normal;">{{ $data['survey-empresa']->Q3_Experience }}</span></div>


<div style="color:#36AE92;font-weight:bold;">Soft skills: <span style="color:#718096;;font-weight:normal;">{{ $data['survey-empresa']->Q3_Soft_skills }}</span></div>


<div style="color:#36AE92;font-weight:bold;">Observacions: <span style="color:#718096;;font-weight:normal;">{{ $data['survey-empresa']->Q3_text }}</span></div>


<br>

<div style="color:#36AE92;font-weight:bold;">Com heu conegut la nostra borsa de treball?</div>
<div>{{ $data['survey-empresa']->Q4_num }}</div>

<div style="color:#36AE92;font-weight:bold;">Observacions</div>
<div>{{ $data['survey-empresa']->Q4_text }}</div>

<br>

<div style="color:#36AE92;font-weight:bold;">La nostra Borsa de Treball és un bon canal gratuït per reclutar professionals del sector?</div>
<div>{{ $data['survey-empresa']->Q5_num }}</div>
<div style="color:#36AE92;font-weight:bold;">Perquè?</div>
@if($data['survey-empresa']->Q5_num === 'Si')
<div>{{ $data['survey-empresa']->Q5_Si_text }}</div>
@else
<div>{{ $data['survey-empresa']->Q5_No_text }}</div>
@endif

<br>

<div style="color:#36AE92;font-weight:bold;">Si teniu alguna aportació per millorar la nostra borsa de treball serà una oportunitat per nosaltres escoltar-la:</div>
<div>{{ $data['survey-empresa']->Q6 }}</div>

<br>

{{ config('app.name') }}
@endcomponent
