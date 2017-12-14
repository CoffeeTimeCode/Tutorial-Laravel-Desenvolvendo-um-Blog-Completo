@extends('usuarios.layouts.app')

@section('content')
<ul class="list-group">
  <li class="list-group-item"><h4 class="text-center">Listar Usuários</h4></li>
    <li class="list-group-item">
      <a href="{!! url('/painel') !!}">Painel</a> -> Listar Usuários
    </li>
</ul>

@if(session('msg'))
  <div class="alert alert-success">
    {!! session('msg') !!}
  </div>
@endif

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">Lista de Usuários</div>
      <div class="panel-body">

        <a href="{!! url('/painel/criar-usuario') !!}">+ Adicionar Usuário</a>

        <div style="width:300px;" class="input-group pull-right">
          <input type="text" class="form-control" placeholder="Pesquisar...">
          <div class="input-group-btn">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filtros <span class="caret"></span></button>
            <ul class="dropdown-menu dropdown-menu-right">
              <li><a href="{!! url('/painel/listar-usuarios/desativados') !!}">Desativados</a></li>
            </ul>
          </div>
        </div>
      </div>

      <table class="table">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Email</th>
            <th>Data Inscrição</th>
            <th></th>
          </tr>
          @foreach($users as $user)
          <tr>
            <td>{!! $user->id !!}</td>
            <td>{!! $user->name !!}</td>

            @if($user->level==0)<td>Leitor</td>@endif
            @if($user->level==1)<td>Revisor</td>@endif
            @if($user->level==2)<td>Admin</td>@endif

            <td>{!! $user->email !!}</td>
            <td>{!! $user->created_at->diffForHumans() !!}</td>
            <td>
              @if(!$user->deleted_at)
                <a href="{!! url('/painel/deletar-usuario/'.$user->id) !!}"
                  class="btn btn-danger btn-sm"
                  title="Deletar Usuário">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
              @endif
            </td>
          </tr>
          @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
