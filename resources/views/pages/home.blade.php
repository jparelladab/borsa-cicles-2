@extends('layouts.app')
@section('content')

<main>
  <div id="homepage">
    <div class="container py-4">
      <div class="page-title">Borsa de treball</div>
      <div class="main-layout">
        <div class="main-left">
          <div class="main-left-text">
            Benvinguda i benvingut al servei de borsa de treball de la Institució Cultural del CIC.
          </div>
        </div>
        <div class="main-right">
          <div class="text-1 mb-3">En aquesta borsa de treball rebem i gestionem:</div>
          <div class="text-2 mb-4">
            CV d'alumnes i exalumnes de les famílies professionals que la ICCIC ha impartit.
            Ofertes laborals d'empreses interessades en alumnes i exalumnes d'aquests cicles formatius.
          </div>
          <div class="two-cards mb-5">
            <a href="{{ route('home.alumnes') }}">
              <div class="card-home">
                <div class="card-body bg-green py-4 px-3">
                  <img src="/images/alumnes.png" alt="">
                  <div class="card-title text-l">Accés alumnes i exalumnes</div>
                  <div class="card-text">Insereix el teu CV per accedir a les ofertes laborals que les empreses han donat d'alta.</div>
                </div>
                <div class="card-footer bg-black">Més informació</div>
              </div>
            </a>
            <a href="{{ route('home.empreses') }}">
              <div class="card-home">
                <div class="card-body bg-green py-4 px-3">
                  <img src="/images/briefcase.png" alt="">
                  <div class="card-title text-l">Accés de les empreses</div>
                  <div class="card-text">Insereix el teu CV per accedir a les ofertes laborals que les empreses han donat d'alta.</div>
                </div>
                <div class="card-footer bg-black">Més informació</div>
              </div>
            </a>
          </div>

          <div class="table-ofertes p-2">
            <div class="title my-2">Darreres ofertes publicades</div>
            <div class="table-header table-row my-3">
              <div>Empresa</div>
              <div>Lloc de treball</div>
            </div>

            @foreach($offers as $offer)
            <div class="table-row py-2">
              <div class="empresa">{{ $offer->empresa()->company_name }}</div>
              <div class="lloc">{{ $offer->title }}</div>
            </div>
            @endforeach
          </div>

          <div class="text-md my-4">
            <p class="graphik-bold-black mb-2">Cicles formatius que gestionem</p>
            <p class="graphik-light-black">Família professional d'activitats físiques i esportives: <span class="graphik-bold-black">CAFEMN, AAFE</span></p>
            <p class="graphik-light-black">Família professional d'arts plàstiques i disseny: <span class="graphik-bold-black">AUTOEDICIÓ, ASSISTÈNCIA AL PRODUCTE GRÀFIC INTERACTIU, GRÀFICA PUBLICITÀRIA, PROJECTES i DIRECCIÓ D'OBRES DE DECORACIÓ, GRÀFICA INTERACTIVA</span> </p>
            <p class="graphik-light-black">Família professional d'informàtica: <span class="graphik-bold-black">ADMINISTRACIÓ DE SISTEMES INFORMÀTICS, DESENVOLUPAMENT D'APLICACIONS INFORMÀTIQUES</span></p>
            <p class="graphik-light-black">Família professional d'administració: <span class="graphik-bold-black">SECRETARIAT</span></p>  
          </div>

          <div class="text-md my-4">
            <p class="graphik-bold-black mb-2">Com funciona la borsa de treball</p>
            <ul>       
              <li class="graphik-light-black">Les empreses es donen d'alta i publiquen ofertes de treball.</li>
              <li class="graphik-light-black">Els alumnes i exalumnes es donen d'alta i s'inscriuen a les ofertes de treball publicades que els puguin interessar. Fins que l'alumne no s'inscriu, l'empresa no veurà les dades dels alumnes.</li>
              <li class="graphik-light-black">L'ICCIC comprova les dades de l'empresa, així com les de l'alumne i les valida perquè puguin accedir a la Borsa de treball.</li>
              <li class="graphik-light-black">L'empresa es posa en contacte amb l'alumne que s'ha inscrit a una oferta de treball seva per tal de fixar una data per una entrevista.</li>
              <li class="graphik-light-black">L'empresa es compromet a comunicar el resultat del procés a l'ICCIC un cop hagi finalitzat.</li>     
            </ul>
            
            
            
            
            
          </div>




        </div>
      </div>
    </div>
  </div>
</main>


@endsection
