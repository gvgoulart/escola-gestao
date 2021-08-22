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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

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
        <h1 style="text-align: center">Editar Usuário</h1>
      </div>
      <div class="card-body">
  
        <form action="{{route('edit-userAction', ['id' => $user->id])}}" method="post">
            @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" value="{{$user->name}}" name="name" placeholder="{{$user->name}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" value="{{$user->email}}" name="email" placeholder="{{$user->email}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
              <select name="role_id" class="form-control">
                  @foreach($roles as $role)
                  <option value="{{ $role->id }}" 
                    @if($role->name == $user->getRoles()[0]) selected @endif > {{ $role->name }}</option>

                  @endforeach
              </select>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
          <div class="row">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Editar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        @if(session('msg'))
              <div class="alert alert-success" role="alert">
                  {{session('msg')}}
              </div>
        @endif
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
  
  
      </div>
  <!-- /.row -->

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