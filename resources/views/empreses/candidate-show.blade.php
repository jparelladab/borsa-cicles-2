@extends('layouts.app')
@section('content')
@include('partials.header-empresa')
  <div class="container py-4">
    <a href="{{ route('empreses.dashboard') }}" class="hover-black"><div class="back mb-4">< Tornar a alumnes inscrits</div></a>

  <div class="my-4 offer-container">
    <div class="page-title-small mb-5">Candidat</div>
    <div class="candidate-name-cv mb-5">
        <div class="name graphik-bold-black mr-5">{{ $candidate->fullName() }}</div>
        <div class="doc-cv d-flex">
            <a href="{{ asset(Storage::url($candidate->cv)) }}" target="_blank"><img src="/images/icon-pdf.png" alt=""></a>
            <div class="title graphik-bold-black mb-1 ml-2">Document CV</div>
        </div>
    </div>
    
    <div class="graphik-bold-black">Estudis</div>
    <div>{{ $candidate->study()->title }}</div>
     <div class="graphik-bold-black mt-3 mb-1">Dades contacte</div>
    <div class="description">{{ $candidate->user()->email }}</div>
    <div class="description">{{ $candidate->phone_number }}</div>
    <div class="description">{{ $candidate->address }}</div>
    <div class="graphik-bold-black mt-3 mb-1">Idiomes</div>
    <div class="description mb-4">{{ $candidate->idiomes }}</div>
     
   
  </div>
  </div>
@endsection
