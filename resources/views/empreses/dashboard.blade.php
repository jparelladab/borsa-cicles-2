

@extends('layouts.app')
@section('content')
@include('partials.header-empresa')
<div id="zona-empresa" class="container">
  @if($empresa->pending_survey)
    @include('partials.survey-empresa-banner')
  @endif
  <div class="ofertes-container my-4">
    @if(Session::has('message'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="ofertes-title mb-3">Ofertes actuals</div>
    <div class="ofertes-grid">

      @foreach($offers as $offer)
      <div class="oferta p-4">
        <div>
          <div class="company-name mb-3">{{ $offer->empresa()->company_name }}</div>
          <div class="description mb-4">{{ \Illuminate\Support\Str::limit($offer->empresa()->description, 150, $end='...') }}</div>
          <div class="position my-4">
            <div class="title">Lloc de treball</div>
            <div class="position-name">{{ $offer->title }}</div>
          </div>
        </div>
        <a href="{{ route('empreses.offers.edit', $offer->id) }}"><div class="offer-link bg-green">Editar oferta</div></a>
      </div>
      @endforeach

    </div>

  </div>
  <div class="title-playfair mb-1">Candidats</div>
  <div class="table-candidats my-4 p-3">
    <div class="table-header table-row p-2">
      <div>Nom</div>
      <div>Estudis</div>
      <div>Oferta</div>
    </div>


       @foreach($offers as $offer)
        @foreach( $offer->alumnes()->get() as $candidat)

          <div class="table-row py-2">
            <div class="nom">{{ $candidat->fullName() }}</div>
            <div class="estudis">{{ $offer->study()->title }}</div>
            <div class="oferta">{{ $offer->title }}</div>
            <div class="green-arrow"><a href="{{ route('empreses.candidates.show', $candidat->id) }}"><img src="{{ asset('images/arrow-green.png') }}" alt=""></a></div>
          </div>
        @endforeach
	    @endforeach

	  </div>
  </div>

</div>
@endsection



