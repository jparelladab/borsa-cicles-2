@extends('layouts.app')
@section('content')
@include('partials.header-admin')
    <div class="container py-4">
        <a href="{{ route('admin.dashboard') }}" class="hover-black"><div class="back mb-4"> < Tornar</div></a>

        <div class="title-playfair mb-3">Oferta</div>
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


        <div class="candidates-container my-4">
            <div class="graphik-bold-green mb-3">Candidats per la oferta</div>
                <div class="table-candidats-admin my-4 p-3">
                    <div class="table-header table-row p-2">
                        <div>Nom</div>
                        <div>Estudis</div>
                    </div>

                    @foreach( $offer->alumnes()->get() as $candidat) 

                        <div class="table-row py-2">
                            <div class="nom">{{ $candidat->fullName() }}</div>
                            <div class="estudis">{{ $offer->study()->title }}</div>
                            <div class="green-arrow"><a href="{{ route('admin.alumnes.show', $candidat->id) }}"><img src="{{ asset('images/arrow-green.png') }}" alt=""></a></div>
                        </div>
                    @endforeach

                    
                </div>
            </div>

            <form action="{{ route('admin.offers.remove', $offer->id) }}" method="post">
              @method('delete')
              @csrf

              <input value="Retirar oferta" type="submit" onclick="return confirm('Estàs segur/a?')" class="btn-black width-fit" style="border:none;outline:none;">

            </form>  

        </div>


    </div>
@endsection
