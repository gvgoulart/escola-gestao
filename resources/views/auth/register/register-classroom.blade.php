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

{{-- Navbar  --}}
 @extends('layouts.navbar') 
{{-- /.navbar --}}
@section('content')
  <!-- Main Sidebar Container -->
    @extends('layouts.main-sidebar')
  

  <div class="content-wrapper">
    <div class="content-header">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Olá {{Auth::user()->roles[0]->name}}!</a></li>
          <li class="breadcrumb-item active">Escola Irroba</li>
        </ol>
      </div>
    </div>  
      <div class="container-fluid">
            <form action="{{route('classroom.create')}}" method="POST">
              @csrf
              <div class="form-floating mb-3">
                <input type="text" class="form-control"  placeholder="Título da matéria"name="title">
              </div>

              <div class="input-group mb-3">
                  <select class="form-control" name="theme">
                    <option disabled selected value="">Selecione a matéria da aula</option>
                      @if($themes == [])
                        <option disabled value="">Não há materias cadastradas</option>
                      @endif
                      @foreach($themes as $theme)
                        <option  value="{{$theme->id}}">{{$theme->name}}</option>
                      @endforeach
                  </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="fas fa-book"></i>
                    </div>
                </div>
              </div>

              <div class="input-group mb-3">
                <select class="form-control" name="teacher">
                  <option disabled selected value="">Selecione o professor da aula</option>
                    @if(Auth::user()->hasRole('professor'))
                      <option selected value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                    @elseif(Auth::user()->hasRole('admin'))
                      @if($teachers == [])
                        <option disabled value="">Não há professores cadastrados</option>
                      @endif
                      @foreach($teachers as $teacher)
                        <option   value="{{$teacher->id}}">{{$teacher->name}}</option>
                      @endforeach
                    @endif
                </select>
              <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
              </div>
            </div>
            <label for="description">Descrição da Aula</label>
              <textarea name="description" id="description" class="form-control"></textarea>
                  <button type="submit" class="btn btn-primary btn-block">Criar Aula</button>
            </form>
      </div>
  </div>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif


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