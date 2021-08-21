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
        
      </div>
      @foreach($classrooms as $classroom)
        <div class="container-fluid">
              <div id="cards-container" class="row">
                <div class="card col-md-4">
                  <div class="card-body">
                      <h5 class="card-title">{{ $classroom->title }}</h5> <br>
                      <h5 class="card-content">Matéria :{{$classroom->theme->name}}</h5>
                      <h5 class="card-content">Professor :{{$classroom->teacher->name}}</h5>
                      <p class="card-participants">{{count($classroom->students)}} Alunos</p>
                      <a href="" class="btn btn-primary">Saber mais</a>
                      @if(Auth::user()->hasRole('aluno')) 
                      <a href="{{route('request-classroom', ['id' => $classroom->id])}}" class="btn btn-primary">
                        Participar
                      </a> 
                      @endif
                  </div>
                </div>
              </div>
        </div>
      @endforeach

  
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