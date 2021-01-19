


@extends('layouts.app')
@section('content')
@include('partials.header-empresa')

<div class="container py-4">
    <div class="container py-4">
        <div class="main-layout">
            <div class="main-left"><div class="main-left-text">Valora la teva experiència</div></div>
        
            <div class="main-right">
            
                <form method="POST" action="{{ route('survey.empresa.store') }}" enctype="multipart/form-data" autocomplete="off">
                    @csrf

                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">{{session('success')}}</div>
                    @endif

                    <div class="graphik-light-black mb-3">
                        Benvolguda empresa,
                        Estem molt agraïts per la vostra confiança i per donar la oportunitat als nostres graduats
                        d’accedir a la vostra oferta laboral. La relació de l’escola amb l’empresa és clau pels nostres
                        alumnes per això és molt important la vostra valoració de l’experiència que heu tingut a la
                        nostra Borsa de Treball. Si us plau, responeu a aquest breu qüestionari, ens ajudarà a millorar:
                    </div>

                    <fieldset class="mb-4">
                        <legend class="mt-4 mb-2">
                            <div class="graphik-bold-black">
                                Algun/a dels nostres graduats/des ha estat seleccionat/da per cobrir la vostra oferta laboral?
                            </div>
                        </legend>

                        <div class="form-rows mb-2 form-check">
                            <input id="Q1_Si" type="radio"  name="Q1" value="Si" {{ old('Q1') == 'Si' ? 'checked' : '' }} class="@error('Q1') is-invalid @enderror">
                            <label class="text-sm" for="Q1_Si">Si</label>                        
                        </div>
                        
                        <div class="form-rows mb-2 form-check">
                            <input id="Q1_No" type="radio" name="Q1" value="No" {{ old('Q1') == 'No' ? 'checked' : '' }} class="@error('Q1') is-invalid @enderror">
                            <label class="text-sm" for="Q1_No">No</label>                        
                            @error('Q1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </fieldset>

                    <fieldset class="mb-4 ">
                        <legend class="mt-4 mb-2">
                            <div class="graphik-bold-black">
                                En el cas de que no hagi estat seleccionat/da, si us plau valoreu en una escala de l’1 al 4 el perfil de/la candidat/a:
                            </div>
                        </legend>

                        <div class="form-rows mb-2 form-check">
                            <input id="Q2_Gens" type="radio"  name="Q2_num" value="No s’apropa gens al perfil requerit" {{ old('Q2_num') == 'Gens' ? 'checked' : '' }} class="@error('Q2_num') is-invalid @enderror">
                            <label class="text-sm" for="Q2_Gens">no s’apropa gens al perfil requerit</label>                        
                        </div>

                        <div class="form-rows mb-2 form-check">
                            <input id="Q2_Poc" type="radio" name="Q2_num" value="S’apropa poc al perfil requerit" {{ old('Q2_num') == 'Poc' ? 'checked' : '' }} class="@error('Q2_num') is-invalid @enderror">
                            <label class="text-sm" for="Q2_Poc">S’apropa poc al perfil requerit</label>                        
                        </div>

                        <div class="form-rows mb-2 form-check">
                            <input id="Q2_Bastant" type="radio" name="Q2_num" value="S’apropa bastant al perfil requerit" {{ old('Q2_num') == 'Bastant' ? 'checked' : '' }} class="@error('Q2_num') is-invalid @enderror">
                            <label class="text-sm" for="Q2_Bastant">S’apropa bastant al perfil requerit</label>                        
                        </div>

                        <div class="form-rows mb-2 form-check">
                            <input id="Q2_Molt" type="radio" name="Q2_num" value="S’apropa molt al perfil requerit" {{ old('Q2_num') == 'Molt' ? 'checked' : '' }} class="@error('Q2_num') is-invalid @enderror">
                            <label class="text-sm" for="Q2_Molt">S’apropa molt al perfil requerit</label>                        
                            @error('Q2_num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-check">
                            <div class="graphik-light-black"><label class="mg-0 text-sm" for="">Observacions</label></div>
                            <textarea id="Q2_text" name="Q2_text" class="width-100 @error('Q2_num') is-invalid @enderror" >{{ old('Q2_text') }}</textarea>                            
                        </div>
                        @error('Q2_text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </fieldset>

                    <fieldset class="mb-4 ">
                        <legend class="mt-4 mb-2">
                            <div class="graphik-bold-black">
                                Puntueu si us plau de l’1 al 4 en cada un d’aquests aspectes la importància que li doneu quan seleccioneu un/a candidat/a, sent 1 gens important i 4 molt important:
                            </div>
                        </legend>

                        <div class="form-rows mb-2 form-check">
                            <input class="small-text-input @error('Q3_Coneixements') is-invalid @enderror" id="Q3_Coneixements" type="text"  name="Q3_Coneixements" value="{{ old('Q3_Coneixements') }}">
                            <label class="text-sm" for="Q3_Coneixements">Nivell de coneixements</label>                        
                            @error('Q3_Coneixements')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-rows mb-2 form-check">
                            <input class="small-text-input @error('Q3_Experience') is-invalid @enderror" id="Q3_Experience" type="text" name="Q3_Experience" value="{{ old('Q3_Experience') }}">
                            <label class="text-sm" for="Q3_Experience">Experiència</label>                        
                            @error('Q3_Experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-rows mb-2 form-check">
                            <input class="small-text-input @error('Q3_Soft_skills') is-invalid @enderror" id="Q3_Soft_skills" type="text" name="Q3_Soft_skills" value="{{ old('Q3_Soft_skills') }}">
                            <label class="text-sm" for="Q3_Soft_skills">Soft skills (habilitats toves), actituds, valors, comunicació....</label>                        
                            @error('Q3_Soft_skills')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-check">
                            <div class="graphik-light-black"><label class="mg-0 text-sm" for="Q3_text">Observacions</label></div>
                            <textarea id="Q3_text" class="width-100 @error('Q2_num') is-invalid @enderror" name="Q3_text">{{ old('Q3_text') }}</textarea>                            
                        </div>
                        @error('Q3_text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </fieldset>
                    
                    <fieldset class="mb-4 ">
                        <legend class="mt-4 mb-2">
                            <div class="graphik-bold-black">
                                Com heu conegut la nostra borsa de treball?
                            </div>
                        </legend>
                       
                        <div class="form-rows mb-2 form-check">
                            <input id="Q4_Internet" type="radio"  name="Q4_num" value="Internet" {{ old('Q4_num') == 'Internet' ? 'checked' : '' }} class="@error('Q4_num') is-invalid @enderror">
                            <label class="text-sm" for="Q4_Internet">Internet</label>                      
                        </div>

                        <div class="form-rows mb-2 form-check">
                            <input id="Q4_Empresa" type="radio" name="Q4_num" value="Sóc empresa col.laboradora de l’escola" {{ old('Q4_num') == 'Empresa' ? 'checked' : '' }} class="@error('Q4_num') is-invalid @enderror">
                            <label class="text-sm" for="Q4_Empresa">Sóc empresa col.laboradora de l’escola</label>                        
                        </div>

                        <div class="form-rows mb-2 form-check">
                            <input id="Q4_Comunitat_educativa" type="radio" name="Q4_num" value="Comunitat educativa" {{ old('Q4_num') == 'Comunitat_educativa' ? 'checked' : '' }} class="@error('Q4_num') is-invalid @enderror">
                            <label class="text-sm" for="Q4_Comunitat_educativa">Comunitat educativa</label>                        
                        </div>

                        <div class="form-rows mb-2 form-check">
                            <input id="Q4_Contact" type="radio" name="Q4_num" value="A través d’un conegut/familiar" {{ old('Q4_num') == 'Contact' ? 'checked' : '' }} class="@error('Q4_num') is-invalid @enderror">
                            <label class="text-sm" for="Q4_Contact">A través d’un conegut/familiar</label>                        
                        </div>
                        
                        <div class="form-rows mb-2 form-check">
                            <input id="Q4_Altres" type="radio" name="Q4_num" value="Altres" {{ old('Q4_num') == 'Altres' ? 'checked' : '' }} class="@error('Q4_num') is-invalid @enderror">
                            <label class="text-sm" for="Q4_Altres">Altres</label>                        
                        @error('Q4_num')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        
                        <div class="form-check">
                            <div class="graphik-light-black"><label class="mg-0 text-sm" for="Q4_text">Observacions</label></div>
                            <textarea id="Q4_text" class="width-100 @error('Q4_text') is-invalid @enderror" name="Q4_text">{{ old('Q4_text') }}</textarea>                            
                        </div>
                        @error('Q4_text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </fieldset>
                    

                    <fieldset class="mb-4 ">
                        <legend class="mt-4 mb-2">
                            <div class="graphik-bold-black">
                                La nostra Borsa de Treball és un bon canal gratuït per reclutar professionals del sector?
                            </div>
                        </legend>
                       
                        <div class="form-rows mb-2 form-check">
                            <input id="Q5_Si" type="radio"  name="Q5_num" value="Si" {{ old('Q5_num') == 'Si' ? 'checked' : '' }} class="@error('Q5_num') is-invalid @enderror">
                            <label class="text-sm" for="Q5_Si">Si, perquè...</label>                        
                        </div>

                        <div class="form-check">
                            <textarea id="Q5_Si_text" class="width-100 @error('Q5_Si_text') is-invalid @enderror" name="Q5_Si_text">{{ old('Q5_Si_text') }}</textarea>                            
                            @error('Q5_Si_text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-rows mb-2 form-check">
                            <input id="Q5_No" type="radio" name="Q5_num" value="No" {{ old('Q5_num') === 'No' ? 'checked' : '' }} class="@error('Q5_num') is-invalid @enderror">
                            <label class="text-sm" for="Q5_No">No, perquè...</label>                        
                            <textarea id="Q5_No_text" name="Q5_No_text" class="width-100 @error('Q5_No_text') is-invalid @enderror" >{{ old('Q5_No_text') }}</textarea>                            
                            @error('Q5_No_text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('Q5_num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    

                    
                    </fieldset>
                    

                    <div class="graphik-bold-black mb-2">
                        Si teniu alguna aportació per millorar la nostra borsa de treball serà una oportunitat per nosaltres escoltar-la:
                    </div>

                    <div class="form-check">
                        <textarea id="Q6" name="Q6" class="width-100 @error('Q5_No_text') is-invalid @enderror" >{{ old('Q6') }}</textarea>                        
                    </div>
                    @error('Q6')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="submit" class="btn-green width-100 mt-5">
                </form>          
            </div>
        </div>
    </div>
</div>
@endsection


