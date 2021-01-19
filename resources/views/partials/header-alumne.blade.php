<div class="header-background py-3">
  <div class="container">
    <div class="alumne-header">
      <div class="avatar">
        <div class="pt-1">
          <a id="avatar-click" href=""><img id="avatar" src="{{ $alumne->getAvatar() }}" alt=""></a>
        </div>
        <div>
          <form method="POST" action="{{ route('alumnes.update-avatar') }}" enctype="multipart/form-data" autocomplete="off">
              @csrf
              @method('PATCH')
            <input type="file" name="avatar" id="avatar-input" accept="image/*" onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0])" style="display:none;">
            <input value="Desar" type="submit" id="avatar-submit" class="btn-green width-fit" style="display:none; margin-top:10px;">
          </form>
        </div>
        @if ($errors->has('avatar'))
          <div class="alert alert-danger" role="alert">
              {{ $errors->first('avatar') }}
          </div>
        @endif
      </div>
      <div class="alumne-info">
        <div>
          <div class="name mb-3">{{ $alumne->fullName() }}</div>
          @foreach($alumne->studies as $study)
            <div class="header-study">{{ $study->title}}</div>
          @endforeach
        </div>
        <div class="contact-data">
          <div class="title mb-1">Dades contacte</div>
          <div class="contact-row">
            <img src="/images/icon-mail.png" alt="">
            <div>{{ $alumne->user()->email }}</div>
          </div>
          <div class="contact-row">
            <img src="/images/icon-mobile.png" alt="">
            <div>{{ $alumne->phone_number }}</div>
          </div>
        </div>
        <div></div>
        <div class="doc-cv">
          <div>
            <div class="title graphik-bold-black mb-1">Document cv</div>
            <a href="{{ asset(Storage::url($alumne->cv))  }}" target="_blank"><img src="/images/icon-pdf.png" alt=""></a>
          </div>
        </div>
      </div>
      <div class="links">
        <a href="{{ route('alumnes.dashboard') }}" class="graphik-bold-green">Inici</a>
        <a href="{{ route('alumnes.edit') }}" class="graphik-bold-green">Editar perfil</a>
        <a href="{{ route('alumnes.applications.index') }}" class="graphik-bold-green">Les meves candidatures</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a class="graphik-bold-green" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
              {{ __('Sortir') }}
          </a>
        </form>
      </div>
    </div>
  </div>
</div>