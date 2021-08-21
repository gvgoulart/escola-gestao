<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="{{route('dashboard')}}" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('logout')}}" class="nav-link">Sair</a>
      </li>
    </ul>
    <!-- Notifications Dropdown Menu -->
    <ul class="navbar-nav ml-auto"> 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">
            @if(count(Auth::user()->unreadNotifications ) > 0) 
              {{count(Auth::user()->unreadNotifications )}}
            @else
            0
            @endif
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">
            @if(count(Auth::user()->unreadNotifications ) > 0) 
              {{count(Auth::user()->unreadNotifications )}} Notificações
            @else
             0 Notificações
            @endif

          </span>
          <div class="dropdown-divider"></div>
          @if(!Auth::user()->hasRole('aluno'))
          <a href="{{route('list-notifications')}}" class="dropdown-item dropdown-footer">Veja todas as notificações</a>
          @else
          <a href="{{route('list-notifications-student')}}" class="dropdown-item dropdown-footer">Veja todas as notificações</a>
          @endif
        </div>
      </li>
    </ul>
  </nav>
@yield('content')

