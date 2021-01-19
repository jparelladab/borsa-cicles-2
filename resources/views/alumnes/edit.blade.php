


@extends('layouts.app')
@section('content')
@include('partials.header-alumne')
<div class="container py-4">
    <div id="create-alumne">
        <form method="POST" action="{{ route('alumnes.update') }}" enctype="multipart/form-data" autocomplete="off">
            <input autocomplete="off" name="hidden" type="text" style="display:none;">
                @csrf
                @method('PATCH')
        <div class="container py-4">
            <div class="main-layout">
                <div class="main-left">
                    <a href="{{ route('alumnes.dashboard') }}" class="hover-black"><div class="back mb-4">< Tornar</div></a>
                    <div class="main-left-text">Edició de perfil</div>
                    <div class="graphik-bold-green mt-4 mb-1">Adjuntar currículum</div>
                    <div class="form-rows mb-2">
                        <input id="cv" type="file" class="file-input @error('cv') is-invalid @enderror" name="cv">
                        @error('cv')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="main-right">

                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif


                    <div class="form-rows mb-2">
                        <input id="address" type="text" class="form-control form-input @error('address') is-invalid @enderror" name="address" value="{{ $alumne['address'] }}" required placeholder="Adreça *">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                        <div class="form-rows mb-2">
                            <input id="location" type="text" class="form-control form-input @error('location') is-invalid @enderror" name="location" value="{{ $alumne['location'] }}" required placeholder="Població *">

                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-rows mb-2">
                            <input id="zip_code" type="text" class="form-control form-input @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ $alumne['zip_code'] }}" required placeholder="Codi Postal">

                            @error('zip_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-rows mb-2">
                            <input id="phone_number" type="tel" class="form-control form-input @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $alumne['phone_number'] }}" required placeholder="Mòbil *">

                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-rows mb-2">
                            <input id="email" type="email" class="form-control form-input @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required placeholder="Adreça electrònica *">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="graphik-bold-black mb-1 mt-4">Altres estudis</div>
                        <div class="studies">

                            @forelse($alumne->otherStudies as $key => $study)
                                <div class="form-rows mb-2">
                                    <input id="other_studies{{ $key + 1 }}" type="text" class="form-control form-input @error('other_studies') is-invalid @enderror" name="other_studies{{ $key + 1 }}" value="{{ $study->title }}">
                                </div>
                            @empty
                                <div class="form-rows mb-2">
                                    <input id="other_studies1" type="text" class="form-control form-input @error('other_studies') is-invalid @enderror" name="other_studies1" value="{{ old('other_studies1') }}">
                                </div>
                            @endforelse
                        </div>
                        <button id="add-study">Afegir estudi</button>

                        <div class="graphik-bold-black mt-4 mb-1">Idiomes</div>
                        <div class="form-rows mb-2">
                            <input id="languages" type="text" class="form-control form-input @error('languages') is-invalid @enderror" name="languages" value="{{ $alumne['languages'] }} ">

                            @error('languages')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="graphik-bold-black mt-4 mb-1">Valoració general i comentaris sobre la formació rebuda a la ICCIC (opcional)</div>
                        <div class="form-rows mb-2">
                            <textarea id="valoracio" rows="4" type="textarea" class="form-control form-input @error('valoracio') is-invalid @enderror" name="valoracio" value="{{ $alumne['valoracio'] }} "></textarea>

                            @error('valoracio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="graphik-bold-black mt-5">Clau de pas per accedir a la zona privada</div>
                        <div class="graphik-black mb-4">Has d'escollir una clau de pas que et resulti fàcil de recordar.</div>

                        <div class="form-rows mb-2">
                            <input id="password" type="password" class="form-control form-input @error('password') is-invalid @enderror" name="password" value="" placeholder="CLAU DE PAS" autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-rows mb-2">
                            <input id="password-confirm" type="password" class="form-control form-input" name="password_confirmation"  placeholder="CONFIRMAR CLAU DE PAS">
                        </div>

                        <div class="form-rows my-3">
                            <button type="submit" class="btn-green width-100">
                                {{ __('Desar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


