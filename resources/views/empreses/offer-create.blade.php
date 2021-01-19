


@extends('layouts.app')
@section('content')
@include('partials.header-empresa')
<div class="container py-4">
  <div id="create-alumne">
    <div class="container py-4">
      <div class="main-layout">
        <div class="main-left">
          <a href="{{ route('empreses.dashboard') }}" class="hover-black"><div class="back mb-4">< Tornar</div></a>
          <div class="main-left-text">Nova oferta</div>
        </div>

        <div class="main-right">

        <form method="POST" action="{{ route('empreses.offers.store') }}" enctype="multipart/form-data" autocomplete="off">
            <input autocomplete="off" name="hidden" type="text" style="display:none;">
            @csrf

            @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            @if(session('success'))
              <div class="alert alert-success" role="alert">{{session('success')}}</div>
            @endif


                <div class="form-rows mb-2">
                    <input id="title" type="text" class="form-control form-input @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Lloc de treball *">

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="description" type="text" class="form-control form-input @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Descripció de la oferta *">

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="requirements" type="text" class="form-control form-input @error('requirements') is-invalid @enderror" name="requirements" value="{{ old('requirements') }}" placeholder="Requisits *">

                    @error('requirements')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="jornada" type="text" class="form-control form-input @error('jornada') is-invalid @enderror" name="jornada" value="{{ old('jornada') }}" placeholder="Jornada/horari *">

                    @error('jornada')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="contract_type" type="text" class="form-control form-input @error('contract_type') is-invalid @enderror" name="contract_type" value="{{ old('contract_type') }}" placeholder="Tipus de contracte *">

                    @error('contract_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="salary" type="text" class="form-control form-input @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" placeholder="Retribució/salari *">

                    @error('salary')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="graphik-bold-green my-3">
                    Molt important seleccionar l’estudi del perfil demandat perquè els
                    interessats rebin un avís directe i es puguin apuntar a l’oferta:
                </div>

            <fieldset id="study_id" class="mb-3">
              <div class="graphik-bold-black mb-1">Grau mig</div>
              
              <div class="form-rows mb-2">
                <input type="radio" value="1" name="study_id" id='1' {{ old('study_id') == 1 ? 'checked' : ''}} class="@error('study_id') is-invalid @enderror">
                <label for="1">Assistència al Producte Gràfic Interactiu (APGI)</label>
              </div>
              <div class="form-rows mb-2">
                <input type="radio" value="2" name="study_id" {{ old('study_id') == 2 ? 'checked' : ''}} id='2' class="@error('study_id') is-invalid @enderror">
                <label for="2">Autoedició</label>
              </div>
              <div class="form-rows mb-2">
                <input type="radio" value="3" name="study_id" {{ old('study_id') == 3 ? 'checked' : ''}} id='3' class="@error('study_id') is-invalid @enderror">
                <label for="3">Conducció d'Activitats FísicoEsportives en el Medi Natural (CAFEMN)</label>
              </div>

              <div class="graphik-bold-black mb-1 mt-3">Grau superior</div>
              
              <div class="form-rows mb-2">
                <input type="radio" value="4" name="study_id" {{ old('study_id') == 4 ? 'checked' : ''}} id='4' class="@error('study_id') is-invalid @enderror">
                <label for="4">Gràfica Interactiva (GI)</label>
              </div>
              <div class="form-rows mb-2">
                <input type="radio" value="5" name="study_id" {{ old('study_id') == 5 ? 'checked' : ''}} id='5' class="@error('study_id') is-invalid @enderror">
                <label for="5">Gràfica Publicitària (GP)</label>
              </div>

              <div class="form-rows mb-2">
                <input type="radio" value="6" name="study_id" {{ old('study_id') == 6 ? 'checked' : ''}} id='6' class="@error('study_id') is-invalid @enderror">
                <label for="6">Condicionament Físic (CF) / AAFE Fitness & Wellness</label>
              </div>

              <div class="form-rows mb-2">
                <input type="radio" value="7" name="study_id" {{ old('study_id') == 7 ? 'checked' : ''}} id='7' class="@error('study_id') is-invalid @enderror">
                <label for="7">Ensenyament i Animació Socioesportiva (EAS) / AAFE Outdoor</label>
              </div>

              <div class="form-rows mb-2">
                <input type="radio" value="8" name="study_id" {{ old('study_id') == 8 ? 'checked' : ''}} id='8' class="@error('study_id') is-invalid @enderror">
                <label for="8">Projectes i Direcció d'Obres de Decoració</label>
              </div>

              <div class="form-rows mb-2">
                <input type="radio" value="9" name="study_id" {{ old('study_id') == 9 ? 'checked' : ''}} id='9' class="@error('study_id') is-invalid @enderror">
                <label for="9">ASI</label>
              </div>

              <div class="form-rows mb-2">
                <input type="radio" value="10" name="study_id" {{ old('study_id') == 10 ? 'checked' : ''}} id='10' class="@error('study_id') is-invalid @enderror">
                <label for="10">DAI</label>
              </div>

              <div class="form-rows mb-2">
                <input type="radio" value="11" name="study_id" {{ old('study_id') == 11 ? 'checked' : ''}} id='11' class="@error('study_id') is-invalid @enderror">
                <label for="11">Secretariat</label>
                @error('study_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </fieldset>

                

                <div class="form-rows my-3">
                    <button type="submit" class="btn-green width-100">
                        {{ __('Afegir oferta') }}
                    </button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection


