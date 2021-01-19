@extends('layouts.app')
@section('content')
<main>
  <div id="acces-zona-alumne">
    <div class="container py-5">
      <div class="breadcrumbs">Menú principal / Accés alumnes / Zona privada</div>
      <div class="page-title">Zona privada</div>
      <div class="main-layout">
        <div class="main-left">
          <div class="main-left-text">
            Accés a la zona privada
          </div>
        </div>
        <div class="main-right">

            <div class="form-acces-zona">
                @include('auth.login')
            </div>

        </div>
      </div>
    </div>
  </div>
</main>

@endsection

