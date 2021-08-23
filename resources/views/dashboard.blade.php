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
    <img class=" brand-image img-circle elevation-3 animation__shake" src="escola/dit/img/VT2sJYUg_400x400.jpg" style="opacity: .8" alt="AdminLTELogo" height="60" width="60">
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
      <div class="content-header">
        <div id="classroom-container" class="row">
          @foreach($classrooms as $classroom)
            <div class="card col-md-4">
              <div class="card-body">
                <h5 class="card-title"><b>{{ $classroom->title }}</b></h5>
                <p class="card-text">{{$classroom->description}}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">{{$classroom->theme->name}}</li>
                <li class="list-group-item">{{$classroom->teacher->name}}</li>
                <li class="list-group-item">{{count($classroom->students)}} Alunos</li>
              </ul>
              <div class="card-body">
                <a href="" class="btn btn-primary">Saber mais</a>
                @if(Auth::user()->hasRole('aluno')) 
                  <a href="{{route('request-classroom', ['id' => $classroom->id])}}" class="btn btn-primary">
                    Participar
                  </a> 
                @endif
              </div>
            </div>
          @endforeach
        </div>
        @if(session('msg'))
        <div class="alert alert-success" role="alert">
            {{session('msg')}}
        </div>
        @endif
      </div> 
    </div>


{{-- Final conteúdo da página --}}

{{--  Links  --}}
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