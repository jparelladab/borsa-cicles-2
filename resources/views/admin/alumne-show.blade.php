@extends('layouts.app')
@section('content')
@include('partials.header-admin')
    <div class="container py-4">
        <a href="{{ route('admin.alumnes') }}" class="hover-black"><div class="back mb-4"> < Tornar a alumnes inscrits</div></a>

        <div class="my-4 alumne-container">

            @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            @if(session('success'))
              <div class="alert alert-success" role="alert">{{session('success')}}</div>
            @endif

            <div class="title-playfair mb-4">{{ $alumne->fullName() }}</div>

            @foreach($alumne->studies as $study)
                <div class="graphik-bold-black alumne-study">{{ $study->title }}</div>
            @endforeach

            <div class="graphik-bold-black mt-4 mb-1">Dades contacte</div>
            <div class="contact-row">
                <img src="/images/icon-mail.png" alt="">
                <div>{{ $alumne->user()->email }}</div>
            </div>
            <div class="contact-row">
                <img src="/images/icon-mobile.png" alt="">
                <div>{{ $alumne->phone_number }}</div>
            </div>

            <div class="title graphik-bold-black mb-1 mt-4">Document CV</div>
            <div class="mb-5"><a class="mb-5" href="{{ asset(Storage::url($alumne->cv)) }}" target="_blank"><img src="/images/icon-pdf.png" alt="" class="doc-cv"></a></div>


            <form action="{{ route('alumnes.activate-survey', $alumne->id) }}" method="post">
              @csrf
              @method('PATCH')
              <input type="hidden" name="alumne_id" value="{{ $alumne->id }}">
              <input class="btn-green width-fit" type="submit" value="Enviar enquesta de valoració">
            </form>

            <form action="{{ route('alumnes.destroy', $alumne->id) }}" method="post">
              @csrf
              @method('DELETE')
              <input class="btn-black width-fit mt-3" type="submit" value="Borrar alumne" onclick="return confirm('Estàs segur/a?')">
            </form>

        </div>
    </div>
@endsection
