<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHP | Gestão de aulas</title>

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


  {{-- Navbar  --}}
 @extends('layouts.navbar') 
 {{-- /.navbar --}}
 @section('content')
    {{-- Navbar aside --}}
     @extends('layouts.main-sidebar')
    {{-- /.navbar aside--}}
    <div class="content-wrapper">
      <div class="content-header">
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Olá {{Auth::user()->roles[0]->name}}!</a></li>
            <li class="breadcrumb-item active">Escola PHP</li>
          </ol>
        </div>
      </div>  
        <div class="container-fluid">
              <form action="{{route('edit-themeAction', ['id' => $theme->id])}}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" value="{{$theme->name}}"name="name">
                </div>
  
                    <button type="submit" class="btn btn-primary btn-block">Editar Matéria</button>
              </form>
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
@endsection