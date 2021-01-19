@extends('layouts.app')
@section('content')

<main>
  <div id="acces-zona-alumne">
    <div class="container py-5">
      <div class="breadcrumbs">Menú principal / Accés alumnes / Zona privada</div>
      <div class="page-title">Zona privada</div>
      <div class="main-layout">
        <div class="main-left">
          <a href="{{ route('home.empreses') }}" class="hover-black"><div class="back mb-4">< Tornar</div></a>
          <div class="main-left-text">
            Accés a la zona privada
          </div>
        </div>
        <div class="main-right">
          @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
          @endif
          <div class="text-1 mb-4">
         		Espai destinat a gestionar les inscripcions dels candidats.
        	</div>
        <div class="form-acces-zona">
          

          @include('auth.login')
        </div>
        <div>
          Si tens cap problema, pots trucar a Maria Serra, Tel. 932 001 133
        </div>

        </div>
      </div>
    </div>
  </div>
</main>


@endsection

