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

   {{-- Tela de carregamento --}}
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class=" brand-image img-circle elevation-3 animation__shake" src="escola/dist/img/VT2sJYUg_400x400.jpg" style="opacity: .8" alt="AdminLTELogo" height="60" width="60">
  </div>

  {{-- Navbar  --}}
 @extends('layouts.navbar') 
 {{-- /.navbar --}}
 @section('content')
    {{-- Navbar aside --}}
     @extends('layouts.main-sidebar')
    {{-- /.navbar aside--}}


   {{-- Conteúdo da página --}}
  <div class="content-wrapper">
     {{-- Conteúdo do cabeçalho --}}
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Olá {{Auth::user()->roles[0]->name}}!</a></li>
                <li class="breadcrumb-item active">Escola Irroba</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
  </div>
  {{-- /.Conteúdo do cabeçalho --}}


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

@endsection