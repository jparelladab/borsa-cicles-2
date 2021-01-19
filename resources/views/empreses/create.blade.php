


@extends('layouts.app')
@section('content')

<div class="container py-4">
  <div id="create-alumne">
    <div class="container py-4">
      <div class="main-layout">
        <div class="main-left">
            <a href="{{ route('home.empreses') }}" class="hover-black"><div class="back mb-4">< Tornar</div></a>
            <div class="main-left-text">
                Per donar d'alta una oferta primer ha de registrar-se i posteriorment entrar a la zona privada.
            </div>
        </div>
        
        <div class="main-right">
            <div class="graphik-bold-black mb-2">Registre noves empreses</div>
            
            <form method="POST" action="{{ route('empreses.store') }}" enctype="multipart/form-data" autocomplete="off">
                <input autocomplete="off" name="hidden" type="text" style="display:none;">
                @csrf

                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                @if(session('success'))
                <div class="alert alert-success" role="alert">{{session('success')}}</div>
                @endif


                    <div class="form-rows mb-2">
                        <input id="company_name" type="text" class="form-control form-input @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}"  placeholder="Nom de l'empresa *">

                        @error('company_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-rows mb-2">
                        <input id="website" type="text" class="form-control form-input @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}"  placeholder="Web *">

                        @error('website')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-rows mb-2">
                        <input id="contact_person" type="text" class="form-control form-input @error('contact_person') is-invalid @enderror" name="contact_person" value="{{ old('contact_person') }}"  placeholder="Persona de contacte">

                        @error('contact_person')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-rows mb-2">
                        <input id="phone_number" type="tel" class="form-control form-input @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}"  placeholder="Telèfon de contacte *">

                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-rows mb-2">
                        <input id="description" type="tel" class="form-control form-input @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  placeholder="Descripció de l'empresa *">

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-rows mb-2">
                        <input id="email" type="email" class="form-control form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Adreça electrònica *">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="graphik-bold-black mt-5">Clau de pas per accedir a la zona privada</div>
                    <div class="graphik-black mb-4">Has d'escollir una clau de pas que et resulti fàcil de recordar.</div>

                    <div class="form-rows mb-2">
                        <input id="password" type="password" class="form-control form-input @error('password') is-invalid @enderror" name="password"  placeholder="CLAU DE PAS" autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-rows mb-2">
                        <input id="password-confirm" type="password" class="form-control form-input @error('password') is-invalid @enderror" name="password_confirmation"  placeholder="CONFIRMAR CLAU DE PAS">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-rows my-3">
                        <button type="submit" class="btn-green width-100">
                            {{ __('Guardar') }}
                        </button>
                    </div>
            </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection


