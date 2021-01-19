


@extends('layouts.app')
@section('content')
@include('partials.header-admin')
<div class="container py-4">
    <div class="container py-4">
      <div class="main-layout">
        <div class="main-left">
          <a href="{{ route('admin.dashboard') }}" class="hover-black"><div class="back mb-4">< Tornar</div></a>
          <div class="main-left-text">Edició de perfil</div>
        </div>

        <div class="main-right">

        <form method="POST" action="{{ route('admin.update') }}" enctype="multipart/form-data" autocomplete="off">
            <input autocomplete="off" name="hidden" type="text" style="display:none;">
            @csrf
             @method('PATCH')

            @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            @if(session('success'))
              <div class="alert alert-success" role="alert">{{session('success')}}</div>
            @endif


                <div class="form-rows mb-2">
                    <input id="name" type="text" class="form-control form-input @error('name') is-invalid @enderror" name="name" value="{{ $admin['name'] }}" placeholder="Nom *">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

               

                <div class="form-rows mb-2">
                    <input id="email" type="email" class="form-control form-input @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="Adreça electrònica *">

                    @error('email')
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
                    <input id="password-confirm" type="password" class="form-control form-input" name="password_confirmation" placeholder="CONFIRMAR CLAU DE PAS">
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
@endsection


