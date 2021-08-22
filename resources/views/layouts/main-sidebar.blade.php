<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('dashboard')}}" class="brand-link">
    <img src="{{asset('escola/dist/img/VT2sJYUg_400x400.jpg')}}" alt="Irroba Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"> Irroba</span>
  </a>

  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>
    @if (Auth::user()->hasRole(['admin', 'professor']))
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Formulários
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('register-user')}}" class="nav-link">
                  <p>Registrar Usuário</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('register-theme')}}" class="nav-link">
                  <p>Registrar Matéria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('classroom')}}" class="nav-link">
                  <p>Registrar Aula</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Listagem
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list.users')}}" class="nav-link">
                  <p>Usuários</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list.classrooms')}}" class="nav-link">
                  <p>Aulas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list.themes')}}" class="nav-link">
                  <p>Matérias</p>
                </a>
              </li>
            </ul>
          </li>
        </div>
    </div>
    @elseif(Auth::user()->hasRole('professor'))
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
          <a href="{{route('register-user')}}" class="d-block">Registrar Aluno</a>
        </div>
    </div>
    @endif
  </div>
</aside>