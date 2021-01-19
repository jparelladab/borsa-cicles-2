

@extends('layouts.app')
@section('content')
@include('partials.header-admin')
<div class="container py-5">

    <a href="{{ route('admin.dashboard') }}" class="hover-black"><div class="back mb-4">< Tornar</div></a>

    <div class="title-playfair mb-5">Alumnes inscrits</div>

  <div class="table-alumnes my-4 p-3">
	    <div class="table-header table-row p-2">
            <div>Nom</div>
            <div>Estudis</div>
	    </div>


       @foreach($alumnes as $alumne)

          <div class="table-row py-2">
            <div class="nom">{{ $alumne->fullName() }}</div>
            <div class="estudis">
              @foreach($alumne->studies as $study)
                <p>{{ $study->title }}</p>
              @endforeach
            </div>
            <div class="green-arrow"><a href="{{ route('admin.alumnes.show', $alumne->id) }}"><img src="{{ asset('images/arrow-green.png') }}" alt=""></a></div>
          </div>

	    @endforeach

	  </div>
  </div>

</div>
@endsection



