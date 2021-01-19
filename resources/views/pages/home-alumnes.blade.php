@extends('layouts.app')
@section('content')

<main>
  <div id="home-alumne">
    <div class="container py-4">
      <div class="page-title">Borsa de treball</div>
      <div class="main-layout">
        <div class="main-left">
          <a href="{{ route('home') }}" class="hover-black"><div class="back mb-4">< Tornar</div></a>
          <div class="main-left-text">
            Benvinguda i benvingut al servei de borsa de treball de la Institució Cultural del CIC.
          </div>
        </div>
        <div class="main-right">
          <div class="text">
          Benvinguda i benvingut a la Borsa de treball. És un espai exclusiu per a alumnes i exalumnes de cicles formatius de la ICCIC que té com objectiu afavorir la comunicació d’aquests amb l’empresa i, per tant, potenciar-ne la inserció laboral.
          Controlem totes les inscripcions per garantir a les empreses que tots els candidats són alumnes nostres.
        </div>
        <div class="text mb-3">
          Primer has d'emplenar la fitxa, i al final hi podràs adjuntar el teu currículum. Posteriorment, amb el teu email i la clau de pas que hagis creat podràs accedir a la teva zona privada sempre que vulguis i així podràs visualitzar les ofertes laborals relacionades amb els teus estudis.
        </div>
        <div class="text">
          Per a qualsevol aclariment, pots contactar amb la Maria Serra: mserra@iccic.edu
        </div>
        <div class="text mb-5">
          Tel. 932001133
        </div>

          <div class="two-cards mb-5">
            <a href="{{ route('alumnes.create') }}">
              <div class="card-home-alumne">
                <img class="card-img" src="/images/alta-cv.png" alt="">
                <div class="card-text">Donar d'alta el currículum</div>
              </div>
            </a>
            <a href="{{ route('auth.alumnes') }}">
              <div class="card-home-alumne">
                <img src="/images/acces-zona.png" alt="">
                <div class="card-text">Accés a la zona privada</div>
              </div>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</main>


@endsection
