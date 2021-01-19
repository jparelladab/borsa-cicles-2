

@extends('layouts.app')
@section('content')
@include('partials.header-admin')
<div class="container py-5">

    <a href="{{ route('admin.dashboard') }}" class="hover-black"><div class="back mb-4">< Tornar</div></a>

    <div class="title-playfair mb-5">Empreses</div>

  <div class="table-empreses my-4 p-3">
	    <div class="table-header table-row p-2">
            <div>Nom</div>
	    </div>


       @foreach($empreses as $empresa)

          <div class="table-row py-2">
            <div class="nom">{{ $empresa->company_name }}</div>
            <div class="green-arrow"><a href="{{ route('admin.empreses.show', $empresa->id) }}"><img src="{{ asset('images/arrow-green.png') }}" alt=""></a></div>
          </div>

	    @endforeach

	  </div>
  </div>

</div>
@endsection



