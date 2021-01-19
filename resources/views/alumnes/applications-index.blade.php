@extends('layouts.app')
@section('content')
@include('partials.header-alumne')
  <div class="container py-4">
    <a href="{{ route('alumnes.dashboard') }}" class="hover-black"><div class="back mb-4">< Tornar</div></a>

  <div class="ofertes-container my-4">
    <div class="ofertes-title mb-3">Les meves candidatures</div>
    <div class="ofertes-grid">

      @foreach($applications as $application)
      <div class="oferta p-4">
        <div>
          <div class="company-name mb-3">{{ $application->empresa()->company_name }}</div>
          <div class="description mb-4">{{ substr($application->empresa()->description, 0, 150) }}</div>
          <div class="position my-4">
            <div class="title">Lloc de treball</div>
            <div class="position-name">{{ $application->title }}</div>
          </div>
        </div>
        <a href="{{ route('alumnes.applications.show', $application->id) }}"><div class="offer-link bg-green">Veure oferta</div></a>
      </div>
      @endforeach

    </div>

  </div>
  </div>
@endsection
