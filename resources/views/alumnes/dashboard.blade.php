@extends('layouts.app')
@section('content')
@include('partials.header-alumne')
<div id="zona-alumne" class="container">
  @if($alumne->pending_survey)
    @include('partials.survey-alumne-banner')
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
        <a href="{{ route('alumnes.applications.show', $offer->id) }}"><div class="offer-link bg-green">Veure oferta</div></a>
      </div>
      @endforeach

    </div>

  </div>

</div>
@endsection



