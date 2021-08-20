<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Irroba | Gestão de aulas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('escola/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('escola/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('escola/dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class=" brand-image img-circle elevation-3 animation__shake" src="escola/dist/img/VT2sJYUg_400x400.jpg" style="opacity: .8" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
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
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Veja todas as notificações</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
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

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Olá {{Auth::user()->roles[0]->name}}!</a></li>
              <li class="breadcrumb-item active">Escola Irroba</li>
            </ol>
          </div>
          <form action="{{route('classroom.create')}}" method="POST">
              @csrf
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="title" placeholder="Titulo da Aula">
                <div class="input-group-append">
                </div>
              </div>

            <textarea name="description"></textarea>

            <div class="row">
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Criar aula</button>
                </div>
                <!-- /.col -->
              </div>
          </form>
        </div>
      </div>
    </div>


<!-- jQuery -->
<script src="{{asset('escola/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('escola/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('escola/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('escola/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('escola/dist/js/adminlte.js')}}"></script>
</body>
</html>

