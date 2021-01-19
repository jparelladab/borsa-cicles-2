
  <div class="header-background py-3">
    <div class="container">
      <div class="empresa-header">

        <div class="empresa-info">
            <div class="name mb-3">{{ $empresa->company_name }}</div>
            <div class="description">{{ $empresa->description }}</div>
        </div>
        <div class="links">
          <a href="{{ route('empreses.dashboard') }}" class="graphik-bold-green">Inici</a>
          <a href="{{ route('empreses.edit') }}" class="graphik-bold-green">Editar perfil</a>
          <a href="{{ route('empreses.offers.create') }}" class="graphik-bold-green">Nova oferta</a>
          
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





