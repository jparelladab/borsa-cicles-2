


@extends('layouts.app')
@section('content')
@include('partials.header-alumne')

<div class="container py-4">
    <div class="container py-4">
        <div class="main-layout">
            <div class="main-left"><div class="main-left-text">Valora la teva experiència</div></div>
        
            <div class="main-right">
            
                <form method="POST" action="{{ route('survey.alumne.store') }}" enctype="multipart/form-data" autocomplete="off">
                    @csrf

                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">{{session('success')}}</div>
                    @endif

                    <div class="graphik-light-black mb-3">
                        Benvolguda candidata, benvolgut candidat,
                        T’agraïm la confiança de compartir les teves dades a la nostra Borsa de Treball.
                        Si us plau, respon a aquest petit qüestionari, ens ajudarà a millorar el servei:
                    </div>


                    <fieldset class="mb-4">
                        <legend class="mb-2">
                            <div class="graphik-bold-black">
                                El procediment a seguir a l’hora d’inscriure’m a les ofertes de la Borsa de Treball m’ha semblat adequat:
                            </div>
                        </legend>
                        <div class="form-rows form-check mb-2">
                            <input id="Q1_Molt" type="radio"  name="Q1_num" value="Molt" {{ old('Q1_num') == 'Molt' ? 'checked' : '' }} class="@error('Q1_num') is-invalid @enderror">
                            <label class="text-sm" for="Q1_Molt">Molt</label>                        
                        </div>
                        
                        <div class="form-rows form-check mb-2">
                            <input id="Q1_Normal" type="radio" name="Q1_num" value="Normal" {{ old('Q1_num') == 'Normal' ? 'checked' : '' }} class="@error('Q1_num') is-invalid @enderror">
                            <label class="text-sm" for="Q1_Normal">Normal</label>                        
                        </div>
                        
                        <div class="form-rows form-check mb-2">
                            <input id="Q1_Poc" type="radio" name="Q1_num" value="Poc" {{ old('Q1_num') == 'Poc' ? 'checked' : '' }} class="@error('Q1_num') is-invalid @enderror">
                            <label class="text-sm" for="Q1_Poc">Poc</label>                        
                        </div>
                        
                        <div class="form-rows form-check mb-2">
                            <input id="Q1_Gens" type="radio" name="Q1_num" value="Gens" {{ old('Q1_num') == 'Gens' ? 'checked' : '' }} class="@error('Q1_num') is-invalid @enderror">
                            <label class="text-sm" for="Q1_Gens">Gens</label>
                            @error('Q1_num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                        
                        </div>
                       
                        <div class="form-check">
                            <div class="graphik-light-black"><label class="mg-0 text-sm" for="Q1_text">Observacions</label></div>
                            <textarea id="Q1_text" class="width-100 @error('Q1_text') is-invalid @enderror" name="Q1_text" value="">{{ old('Q1_text') }}</textarea>                            
                            @error('Q1_text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                        </div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <legend class="mb-2">
                            <div class="graphik-bold-black">
                                Les ofertes de la Borsa de Treball s’adeqüen als meus interessos professionals:
                            </div>
                        </legend>

                        <div class="form-rows form-check mb-2">
                            <input id="Q2_Molt" type="radio"  name="Q2_num" value="Molt" {{ old('Q2_num') == 'Molt' ? 'checked' : '' }} class="@error('Q2_num') is-invalid @enderror">
                            <label class="text-sm" for="Q2_Molt">Molt</label>                        
                        </div>

                        <div class="form-rows form-check mb-2">
                            <input id="Q2_Bastant" type="radio" name="Q2_num" value="Bastant" {{ old('Q2_num') == 'Bastant' ? 'checked' : '' }} class="@error('Q2_num') is-invalid @enderror">
                            <label class="text-sm" for="Q2_Bastant">Bastant</label>                        
                        </div>

                        <div class="form-rows form-check mb-2">
                            <input id="Q2_Poc" type="radio" name="Q2_num" value="Poc" {{ old('Q2_num') == 'Poc' ? 'checked' : '' }} class="@error('Q2_num') is-invalid @enderror">
                            <label class="text-sm" for="Q2_Poc">Poc</label>                        
                        </div>

                        <div class="form-rows form-check mb-2">
                            <input id="Q2_Gens" type="radio" name="Q2_num" value="Gens" {{ old('Q2_num') == 'Gens' ? 'checked' : '' }} class="@error('Q2_num') is-invalid @enderror">
                            <label class="text-sm" for="Q2_Gens">Gens</label>
                            @error('Q2_num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                         
                        </div>

                        <div class="form-check">
                            <div class="graphik-light-black"><label class="mg-0 text-sm" for="">Observacions</label></div>
                            <textarea id="Q2_text" class="width-100 @error('Q2_text') is-invalid @enderror" name="Q2_text">{{ old('Q2_text') }}</textarea>                            
                            @error('Q2_text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                        </div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <legend class="mb-2">
                            <div class="graphik-bold-black">
                                Quan m’inscric a una oferta laboral, encara que no hagi estat seleccionat/da, normalment rebo una resposta de l’empresa:
                            </div>
                        </legend>

                        <div class="form-rows form-check mb-2">
                        <input id="Q3_Sempre" type="radio"  name="Q3_num" value="Sempre" {{ old('Q3_num') == 'Sempre' ? 'checked' : '' }} class="@error('Q3_num') is-invalid @enderror">
                            <label class="text-sm" for="Q3_Sempre">Sempre</label>                        
                        </div>

                        <div class="form-rows form-check mb-2">
                        <input id="Q3_Algunes_vegades" type="radio" name="Q3_num" value="Algunes_vegades" {{ old('Q3_num') == 'Algunes_vegades' ? 'checked' : '' }} class="@error('Q3_num') is-invalid @enderror">
                            <label class="text-sm" for="Q3_Algunes_vegades">Algunes vegades</label>                        
                        </div>

                        <div class="form-rows form-check mb-2">
                        <input id="Q3_Poques_vegades" type="radio" name="Q3_num" value="Poques_vegades" {{ old('Q3_num') == 'Poques_vegades' ? 'checked' : '' }} class="@error('Q3_num') is-invalid @enderror">
                            <label class="text-sm" for="Q3_Poques_vegades">Poques vegades</label>                        
                        </div>

                        <div class="form-rows form-check mb-2">
                            <input id="Q3_Mai" type="radio" name="Q3_num" value="Mai" {{ old('Q3_num') == 'Mai' ? 'checked' : '' }} class="@error('Q3_num') is-invalid @enderror">
                            <label class="text-sm" for="Q3_Mai">Mai</label>                        
                            @error('Q3_num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                        </div>

                        <div class="form-check">
                            <div class="graphik-light-black"><label class="mg-0 text-sm" for="Q3_text">Observacions</label></div>
                            <textarea id="Q3_text" class="width-100 @error('Q3_text') is-invalid @enderror" name="Q3_text">{{ old('Q3_text') }}</textarea> 
                            @error('Q3_text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                            
                        </div>
                    </fieldset>
                    

                    <fieldset class="mb-4">
                        <legend class="mb-2">
                            <div class="graphik-bold-black">
                                La formació i la titulació professional adquirida al CIC - ELISAVA Cicles formatius m’ha preparat per trobar feina al sector:
                            </div>
                        </legend>
                       
                        <div class="form-rows form-check mb-2">
                            <input id="Q4_Molt" type="radio"  name="Q4_num" value="Molt" {{ old('Q4_num') == 'Molt' ? 'checked' : '' }} class="@error('Q4_num') is-invalid @enderror">
                            <label class="text-sm" for="Q4_Molt">Molt</label>                        
                        </div>

                        <div class="form-rows form-check mb-2">
                            <input id="Q4_Bastant" type="radio" name="Q4_num" value="Bastant" {{ old('Q4_num') == 'Bastant' ? 'checked' : '' }} class="@error('Q4_num') is-invalid @enderror">
                            <label class="text-sm" for="Q4_Bastant">Bastant</label>                        
                        </div>

                        <div class="form-rows form-check mb-2">
                            <input id="Q4_Poc" type="radio" name="Q4_num" value="Poc" {{ old('Q4_num') == 'Poc' ? 'checked' : '' }} class="@error('Q4_num') is-invalid @enderror">
                            <label class="text-sm" for="Q4_Poc">Poc</label>                        
                        </div>

                        <div class="form-rows form-check mb-2">
                            <input id="Q4_Gens" type="radio" name="Q4_num" value="Gens" {{ old('Q4_num') == 'Gens' ? 'checked' : '' }} class="@error('Q4_num') is-invalid @enderror">
                            <label class="text-sm" for="Q4_Gens">Gens</label> 
                            @error('Q4_num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                       
                        </div>

                        <div class="form-check">
                            <div class="graphik-light-black"><label class="mg-0 text-sm" for="Q4_text">Observacions</label></div>
                            <textarea id="Q4_text" class="width-100 @error('Q4_num') is-invalid @enderror" name="Q4_text">{{ old('Q4_text') }}</textarea>                            
                            @error('Q4_text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </fieldset>
                    

                    <legend  for="Q5">
                        <div class="graphik-bold-black">
                            Si tens alguna aportació per millorar la nostra borsa de treball serà una oportunitat per nosaltres escoltar-la:
                        </div>
                    </legend>
                    <div class="form-check">
                        <textarea id="Q5" class="width-100 @error('Q5') is-invalid @enderror" name="Q5">{{ old('Q5') }}</textarea>                        
                        @error('Q5')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                
                    <input type="submit" class="btn-green width-100 mt-5">
                </form>          
            </div>
        </div>
    </div>
</div>
@endsection


