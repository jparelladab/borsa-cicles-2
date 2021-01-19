@extends('layouts.app')
@section('content')
@include('partials.header-admin')
    <div class="container py-4">
        <a href="{{ route('admin.empreses') }}" class="hover-black"><div class="back mb-4"> < Tornar a Empreses</div></a>

        <div class="my-4 alumne-container">

            @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            @if(session('success'))
              <div class="alert alert-success" role="alert">{{session('success')}}</div>
            @endif

            <div class="title-playfair mb-4">{{ $empresa->company_name }}</div>


            <div class="graphik-bold-black empresa-description mb-4">{{ $empresa->description }}</div>

            <div class="graphik-bold-black text-sm mb-1">Dades contacte</div>
            <div class="graphik-bold-green text-sm mb-3">{{ $empresa->contact_person }}</div>
            <div class="contact-row">
                <img src="/images/icon-mail.png" alt="">
                <div>{{ $empresa->user()->email }}</div>
            </div>
            <div class="contact-row">
                <img src="/images/icon-mobile.png" alt="">
                <div>{{ $empresa->phone_number }}</div>
            </div>
            <div class="contact-row mb-5">
                <img src="{{ asset('images/icon-web.png') }}" alt="">
                <div>{{ $empresa->website }}</div>
            </div>

            <form action="{{ route('empreses.activate-survey', $empresa->id) }}" method="post">
              @csrf
              @method('PATCH')
              <input type="hidden" name="empresa_id" value="{{ $empresa->id }}">
              <input class="btn-green width-fit" type="submit" value="Enviar enquesta de valoració">
            </form>

            <form action="{{ route('empreses.destroy', $empresa->id) }}" method="post">
              @csrf
              @method('DELETE')
              <input class="btn-black width-fit mt-3" type="submit" value="Borrar empresa" onclick="return confirm('Estàs segur/a?')">
            </form>
        </div>
    </div>
@endsection
