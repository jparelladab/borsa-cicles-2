@extends('layouts.app')
@section('content')

<main>
  <div id="home-alumne">
    <div class="container py-4">
      <div class="page-title">Borsa de treball - Empreses</div>
      <div class="main-layout">
        <div class="main-left">
          <a href="{{ route('home') }}" class="hover-black"><div class="back mb-4">< Tornar</div></a>
          <div class="main-left-text">
            Benvinguda i benvingut al servei de borsa de treball de la Institució Cultural del CIC.
          </div>
        </div>
        <div class="main-right">
          <div class="text">
          	Aquest és un servei per als nostres alumnes i exalumnes de cicles formatius orientat a
			afavorir-ne la inserció laboral. L’objectiu principal i final és posar en contacte l’empresa i
			l’alumne o l'exalumne, és a dir, el servei s’acaba quan el contacte s’ha realitzat. Tot el que
			s’estableix posteriorment no és competència ni responsabilitat de la ICCIC.
        </div>
        <div class="text mb-3">
	        Cada nova oferta laboral es validarà en un termini màxim de 2 dies laborables (vegeu el
			calendari laboral de la ICCIC a l’inici).
        </div>
        <div class="text">
          Per a qualsevol aclariment, pots contactar amb la Maria Serra: mserra@iccic.edu
        </div>
        <div class="text mb-5">
          Tel. 932001133
        </div>

          <div class="two-cards mb-5">
            <a href="{{ route('empreses.create') }}">
              <div class="card-home-alumne">
                <img class="card-img" src="/images/alta-cv.png" alt="">
                <div class="card-text">Donar d'alta l’empresa</div>
              </div>
            </a>
            <a href="{{ route('auth.empreses') }}">
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
