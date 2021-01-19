<div class="header-background py-3">
  <div class="container">
    <div class="admin-header">

      <div class="welcome">
          Benvinguda / benvingut
      </div>
      <div class="links">
        <a href="{{ route('admin.dashboard') }}" class="graphik-bold-green hover-green">Inici</a>
        <a href="{{ route('admin.empreses') }}" class="graphik-bold-green hover-green">Empreses</a>
        <a href="{{ route('admin.alumnes') }}" class="graphik-bold-green hover-green">Alumnes inscrits</a>
        <a href="{{ route('admin.edit') }}" class="graphik-bold-green hover-green">Editar perfil</a>
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






