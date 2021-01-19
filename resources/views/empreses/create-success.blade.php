
@extends('layouts.app')
@section('content')

<div class="container py-4">
  <div id="create-alumne">
    <div class="container py-4">
      <div class="main-layout">
        <div class="main-left">
          <a href="{{ route('home.empreses') }}" class="hover-black"><div class="back mb-4">< Tornar</div></a>
          <div class="main-left-text">
            Per donar d'alta una oferta primer ha de registrar-se i posteriorment entrar a la zona privada.
          </div>
        </div>
        <div class="main-right">
          @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
          @endif

        </div>
      </div>
    </div>
  </div>

</div>
@endsection
