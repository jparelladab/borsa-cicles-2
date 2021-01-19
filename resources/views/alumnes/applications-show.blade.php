@extends('layouts.app')
@section('content')
@include('partials.header-alumne')
  <div class="container py-4">
    <a href="{{ route('alumnes.dashboard') }}" class="hover-black"><div class="back mb-4">< Tornar</div></a>
   
    @if(Session::has('message'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
  
    <div class="my-4 offer-container">
      <div class="page-title-small mb-3">Oferta</div>
      <div class="text-l graphik-bold-black mb-3">{{ $offer->empresa()->company_name }}</div>
      <div class="graphik-black mb-4">{{ substr($offer->empresa()->description, 0, 150) }}</div>
      <div class="position my-4">
        <div class="title graphik-bold-green">Lloc de treball</div>
        <div class="position-name graphik-bold-black">{{ $offer->title }}</div>

        <div class="title graphik-bold-green mt-3">Grau relacionat</div>
          <div class="position-name graphik-black">{{ $offer->study()->title }}</div>

        <div class="title graphik-bold-green mt-3">Descripció</div>
        <div class="position-name graphik-black">{{ $offer->description }}</div>

        <div class="title graphik-bold-green mt-3">Requeriments</div>
        <div class="position-name graphik-black">{{ $offer->requirements }}</div>

        <div class="title graphik-bold-green mt-3">Jornada</div>
        <div class="position-name graphik-black">{{ $offer->jornada }}</div>

        <div class="title graphik-bold-green mt-3">Tipus de contracte</div>
        <div class="position-name graphik-black">{{ $offer->contract_type }}</div>

        <div class="title graphik-bold-green mt-3">Retribució/salari</div>
        <div class="position-name graphik-black">{{ $offer->salary }}</div>
      </div>
{{--     <div class="social-icons mb-5">
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ca_ES/sdk.js#xfbml=1&version=v9.0" nonce="17CZLVt5"></script>
      <div class="fb-share-button" data-href="{{ Route::currentRouteName() }}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Comparteix</a></div>
      <a href=""><img src="{{ asset('images/icon-facebook.png') }}"></a>


      <a href=""><img src="{{ asset('images/icon-twitter.png') }}"></a>
      <a href="https://twitter.com/intent/tweet" class="twitter-share-button" data-show-count="false">Tweet</a>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      <a href=""><img src="{{ asset('images/icon-mail-black.png') }}"></a>
    </div> --}}
    <a href="{{ route('alumnes.applications.store', $offer->id) }}">
      <form method="POST" action="{{ route('alumnes.applications.store', $offer->id) }}" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('PATCH')
        @if($alumne->hasAppliedTo($offer->id))
          <input value="Retirar candidatura" type="submit" class="offer-btn bg-black">
        @else
         <input value="Inscriure's" type="submit"class="offer-btn bg-green">
        @endif
      </form>

    </a>
  </div>
  </div>
@endsection
