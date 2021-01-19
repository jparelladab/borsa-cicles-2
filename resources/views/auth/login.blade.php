

        <form method="POST" action="{{ route('login') }}">
            @csrf

              <div class="mb-3">

                <label for="email" class="mb-1 graphik-bold-black">Email</label>

                <div class="">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

              </div>

            <div class="mb-3">
                <label for="password" class="mb-1 graphik-bold-black">Clau de pas</label>

                <div class="">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="">
                <div class="">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="form-buttons my-4">
                    <button type="submit" class="black-btn">
                        {{ __('Valida') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="black-btn" href="{{ route('password.request') }}">
                            {{ __('Recordar clau') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>




