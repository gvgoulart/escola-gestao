<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('dashboard')}}" class="brand-link">
    <img src="escola/dist/img/VT2sJYUg_400x400.jpg" alt="Irroba Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"> Irroba</span>
  </a>


  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
          <a href="{{route('classroom')}}" class="d-block">Nova Aula</a>
        </div>
    </div>
    @if (Auth::user()->hasRole('admin'))
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
          <a href="{{route('register')}}" class="d-block">Registrar Usuário</a>
        </div>
    </div>
    @elseif(Auth::user()->hasRole('professor'))
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
          <a href="{{route('register')}}" class="d-block">Registrar Aluno</a>
        </div>
    </div>
    @endif
  </div>
</aside>