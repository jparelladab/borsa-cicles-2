<!-- @extends('layouts.app')
@section('content')
@include('partials.header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <input id="role_id" type="hidden"  name="role_id" value="2">
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first-name') }}" required autocomplete="first name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name_1" class="col-md-4 col-form-label text-md-right">{{ __('1r Cognom') }}</label>

                            <div class="col-md-6">
                                <input id="last_name_1" type="text" class="form-control @error('last_name_1') is-invalid @enderror" name="last_name_1" value="{{ old('last_name_1') }}" required autocomplete="1r Cognom *" autofocus>

                                @error('last_name_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name_2" class="col-md-4 col-form-label text-md-right">{{ __('2n Cognom') }}</label>

                            <div class="col-md-6">
                                <input id="last_name_2" type="text" class="form-control @error('last_name_2') is-invalid @enderror" name="last_name_2" value="{{ old('last_name_2') }}" required autocomplete="2n cognom" autofocus>

                                @error('last_name_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="DNI" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

                            <div class="col-md-6">
                                <input id="DNI" type="text" class="form-control @error('DNI') is-invalid @enderror" name="DNI" value="{{ old('DNI') }}" required autocomplete="DNI" autofocus>

                                @error('DNI')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Data de naixement') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="text" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="Data de naixement" autofocus>

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Adreça') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="Adreça" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Població') }}</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="Població" autofocus>

                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-right">{{ __('Codi Postal') }}</label>

                            <div class="col-md-6">
                                <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" required autocomplete="Codi Postal" autofocus>

                                @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Mòbil') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="Mòbil" autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="title">Cicle Formatiu estudiat a la ICCIC</div>
                        <div class="form-group row">
                          <fieldset id="study_id">
                            <div class="title-black">Grau mig</div>
                            <div class="form-row">
                              <input type="radio" value="1" name="study_id" id='1' required>
                              <label for="1">Assistència al Producte Gràfic Interactiu (APGI)</label>
                            </div>
                            <div class="form-row">
                              <input type="radio" value="2" name="study_id" id='2'>
                              <label for="2">Autoedició</label>
                            </div>
                            <div class="form-row">
                              <input type="radio" value="3" name="study_id" id='3'>
                              <label for="3">Conducció d'Activitats FísicoEsportives en el Medi Natural (CAFEMN)</label>
                            </div>
                            <div class="form-row">
                              <input type="radio" value="4" name="study_id" id='4'>
                              <label for="4">Gràfica Interactiva (GI)</label>
                            </div>

                            <div class="title-black">Grau superior</div>
                            <div class="form-row">
                              <input type="radio" value="5" name="study_id" id='5'>
                              <label for="5">Gràfica Publicitària (GP)</label>
                            </div>

                            <div class="form-row">
                              <input type="radio" value="6" name="study_id" id='6'>
                              <label for="6">Condicionament Físic (CF) / AAFE Fitness & Wellness</label>
                            </div>

                            <div class="form-row">
                              <input type="radio" value="7" name="study_id" id='7'>
                              <label for="7">Ensenyament i Animació Socioesportiva (EAS) / AAFE Outdoor</label>
                            </div>

                            <div class="form-row">
                              <input type="radio" value="8" name="study_id" id='8'>
                              <label for="8">Projectes i Direcció d'Obres de Decoració</label>
                            </div>

                            <div class="form-row">
                              <input type="radio" value="9" name="study_id" id='9'>
                              <label for="9">ASI</label>
                            </div>

                            <div class="form-row">
                              <input type="radio" value="10" name="study_id" id='10'>
                              <label for="10">DAI</label>
                            </div>

                            <div class="form-row">
                              <input type="radio" value="11" name="study_id" id='11'>
                              <label for="11">Secretariat</label>
                            </div>
                          </fieldset>
                          @error('study_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>

                          <div class="form-group row">
                            <label for="study_end" class="col-md-4 col-form-label text-md-right">{{ __('Any de finalització') }}</label>

                            <div class="col-md-6">
                                <input id="study_end" type="text" class="form-control @error('study_end') is-invalid @enderror" name="study_end" value="{{ old('study_end') }}" required autocomplete="study_end">

                                @error('study_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="other_studies" class="col-md-4 col-form-label text-md-right">{{ __('Altres estudis') }}</label>

                            <div class="col-md-6">
                                <input id="other_studies" type="text" class="form-control @error('other_studies') is-invalid @enderror" name="other_studies" value="{{ old('other_studies') }}" autocomplete="other_studies">

                                @error('other_studies')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="languages" class="col-md-4 col-form-label text-md-right">{{ __('Idiomes') }}</label>

                            <div class="col-md-6">
                                <input id="languages" type="text" class="form-control @error('languages') is-invalid @enderror" name="languages" value="{{ old('languages') }}" autocomplete="languages">

                                @error('languages')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="valoracio" class="col-md-4 col-form-label text-md-right">{{ __('Valoració general i comentaris sobre la formació rebuda a la ICCIC (opcional)') }}</label>

                            <div class="col-md-6">
                                <input id="valoracio" type="text" class="form-control @error('valoracio') is-invalid @enderror" name="valoracio" value="{{ old('valoracio') }}" autocomplete="valoracio">

                                @error('valoracio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cv">{{ __('Adjuntar currículum') }}</label>

                            <div class="col-md-6">
                                <input id="cv" type="file" class="" name="cv">

                                @error('cv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar currículum') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->
