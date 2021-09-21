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
        <h1 style="text-align: center">Usuários</h1>
      </div>
<div class="row" style="width: 100%">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Editar</th>
                <th>Excluir</th>
              </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><span class="tag tag-success">{{$user->roles[0]->display_name}}</span></td>
                <td><a href="{{route('edit-user', ['id' => $user->id])}}"><i class="bi bi-pencil-square"></i></a></td>
                <td><a href="{{route('delete-user', ['id' => $user->id])}}"><i class="bi bi-trash-fill"></i></a></td
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
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