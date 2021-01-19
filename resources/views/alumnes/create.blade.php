
@extends('layouts.app')
@section('content')

<div class="container py-4">
  <div id="create-alumne">
    <div class="container py-4">
      <div class="page-title">Alta currículum</div>
      <div class="main-layout">
        <div class="main-left">
            <a href="{{ route('home.alumnes') }}" class="hover-black"><div class="back mb-4">< Tornar</div></a>
            <div class="main-left-text">
                Cumplimenta el formulari amb el teu currículum per poder accedir a la borsa de treball.
            </div>
        </div>
        <div class="main-right">

        <form method="POST" action="{{ route('alumnes.store') }}" enctype="multipart/form-data" autocomplete="off">
            <input autocomplete="off" name="hidden" type="text" style="display:none;">
            @csrf

            @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif

            <input id="role_id" type="hidden"  name="role_id" value="2">


                <div class="form-rows mb-2">
                    <input id="first_name" type="text" class="form-control form-input @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"  placeholder="Nom *">

                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="last_name_1" type="text" class="form-control form-input @error('last_name_1') is-invalid @enderror" name="last_name_1" value="{{ old('last_name_1') }}" placeholder="1r Cognom *">

                    @error('last_name_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="last_name_2" type="text" class="form-control form-input @error('last_name_2') is-invalid @enderror" name="last_name_2" value="{{ old('last_name_2') }}" placeholder="2n Cognom *">

                    @error('last_name_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="DNI" type="text" class="form-control form-input @error('DNI') is-invalid @enderror" name="DNI" value="{{ old('DNI') }}" placeholder="DNI *">

                    @error('DNI')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="date_of_birth" type="text" class="form-control form-input @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="Data de naixement *" onfocus="(this.type='date')">

                    @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="address" type="text" class="form-control form-input @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Adreça *">

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="location" type="text" class="form-control form-input @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" placeholder="Població *">

                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="zip_code" type="text" class="form-control form-input @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" placeholder="Codi Postal">

                    @error('zip_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="phone_number" type="tel" class="form-control form-input @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="Mòbil *">

                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="email" type="email" class="form-control form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Adreça electrònica *">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            <div class="graphik-bold-green mt-5 mb-3">Cicle Formatiu estudiat a la ICCIC</div>

            <fieldset id="study_id" class="mb-3">
              <div class="graphik-bold-black mb-1">Grau mig</div>
              
              <div class="form-rows mb-2">
                <input type="checkbox" id="study_1" value="1" name="study_1" {{ old('study_1') == 1 ? 'checked' : ''}} id='1' class="@error('study_1') is-invalid @enderror">
                <label for="study_1">Assistència al Producte Gràfic Interactiu (APGI)</label>
              </div>
              <div class="form-rows mb-2">
                <input type="checkbox" id="study_2" value="2" name="study_2" {{ old('study_2') == 2 ? 'checked' : ''}} id='2' class="@error('study_2') is-invalid @enderror">
                <label for="study_2">Autoedició</label>
              </div>
              <div class="form-rows mb-2">
                <input type="checkbox" id="study_3" value="3" name="study_3" {{ old('study_3') == 3 ? 'checked' : ''}} id='3' class="@error('study_3') is-invalid @enderror">
                <label for="study_3">Conducció d'Activitats FísicoEsportives en el Medi Natural (CAFEMN)</label>
              </div>

              <div class="graphik-bold-black mb-1 mt-3">Grau superior</div>
              
              <div class="form-rows mb-2">
                <input type="checkbox" id="study_4" value="4" name="study_4" {{ old('study_4') == 4 ? 'checked' : ''}} id='4' class="@error('study_4') is-invalid @enderror">
                <label for="study_4">Gràfica Interactiva (GI)</label>
              </div>
              <div class="form-rows mb-2">
                <input type="checkbox" id="study_5" value="5" name="study_5" {{ old('study_5') == 5 ? 'checked' : ''}} id='5' class="@error('study_5') is-invalid @enderror">
                <label for="study_5">Gràfica Publicitària (GP)</label>
              </div>

              <div class="form-rows mb-2">
                <input type="checkbox" id="study_6" value="6" name="study_6" {{ old('study_6') == 6 ? 'checked' : ''}} id='6' class="@error('study_6') is-invalid @enderror">
                <label for="study_6">Condicionament Físic (CF) / AAFE Fitness & Wellness</label>
              </div>

              <div class="form-rows mb-2">
                <input type="checkbox" id="study_7" value="7" name="study_7" {{ old('study_7') == 7 ? 'checked' : ''}} id='7' class="@error('study_7') is-invalid @enderror">
                <label for="study_7">Ensenyament i Animació Socioesportiva (EAS) / AAFE Outdoor</label>
              </div>

              <div class="form-rows mb-2">
                <input type="checkbox" id="study_8" value="8" name="study_8" {{ old('study_8') == 8 ? 'checked' : ''}} id='8' class="@error('study_8') is-invalid @enderror">
                <label for="study_8">Projectes i Direcció d'Obres de Decoració</label>
              </div>

              <div class="form-rows mb-2">
                <input type="checkbox" id="study_9" value="9" name="study_9" {{ old('study_9') == 9 ? 'checked' : ''}} id='9' class="@error('study_9') is-invalid @enderror">
                <label for="study_9">ASI</label>
              </div>

              <div class="form-rows mb-2">
                <input type="checkbox" id="study_10" value="10" name="study_10" {{ old('study_10') == 10 ? 'checked' : ''}} id='10' class="@error('study_10') is-invalid @enderror">
                <label for="study_10">DAI</label>
              </div>

              <div class="form-rows mb-2">
                <input type="checkbox" id="study_11" value="11" name="study_11" {{ old('study_11') == 11 ? 'checked' : ''}} id='11' class="@error('study_11') is-invalid @enderror">
                <label for="study_11">Secretariat</label>
               @if(Session::has('error_studies'))
                  <p class="invalid-feedback" role="alert" style="display:block;">{{ Session::get('error_studies') }}</p>
                @endif
              </div>
            </fieldset>



                <div class="form-rows mb-2">
                    <input id="study_end" type="numeric" class="form-control form-input @error('study_end') is-invalid @enderror" name="study_end" value="{{ old('study_end') }}" placeholder="Any de finalització (estudi més recent)">

                    @error('study_end')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="graphik-bold-black mt-4 mb-1">Altres estudis</div>
                <div class="form-rows mb-2">
                    <input id="other_studies" type="text" class="form-control form-input @error('other_studies') is-invalid @enderror" name="other_studies" value="{{ old('other_studies') }}">

                    @error('other_studies')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="graphik-bold-black mt-4 mb-1">Idiomes</div>
                <div class="form-rows mb-2">
                    <input id="languages" type="text" class="form-control form-input @error('languages') is-invalid @enderror" name="languages" value="{{ old('languages') }}">

                    @error('languages')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="graphik-bold-black mt-4 mb-1">Valoració general i comentaris sobre la formació rebuda a la ICCIC (opcional)</div>
                <div class="form-rows mb-2">
                    <input id="valoracio" type="text" class="form-control form-input @error('valoracio') is-invalid @enderror" name="valoracio" value="{{ old('valoracio') }}">

                    @error('valoracio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="graphik-bold-black mt-4 mb-1">Adjuntar currículum</div>
                <div class="form-rows mb-2">
                    <input id="cv" type="file" class="file-input @error('cv') is-invalid @enderror" name="cv" value="{{ old('cv') }}">

                    @error('cv')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="graphik-bold-black mt-5">Clau de pas per accedir a la zona privada</div>
                <div class="graphik-black mb-4">Has d'escollir una clau de pas que et resulti fàcil de recordar.</div>
                <div class="form-rows mb-2">
                    <input id="password" type="password" class="form-control form-input @error('password') is-invalid @enderror" name="password" placeholder="CLAU DE PAS" autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows mb-2">
                    <input id="password-confirm" type="password" class="form-control form-input @error('password') is-invalid @enderror" name="password_confirmation" placeholder="CONFIRMAR CLAU DE PAS">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-rows my-3">
                    <button type="submit" class="btn-green width-100">
                        {{ __('Enviar currículum') }}
                    </button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection


