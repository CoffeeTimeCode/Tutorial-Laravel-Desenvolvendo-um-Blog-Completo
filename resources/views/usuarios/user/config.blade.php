@extends('usuarios.layouts.app')

@section('content')
<ul class="list-group">
  <li class="list-group-item"><h4 class="text-center">Minhas Configurações</h4></li>
    <li class="list-group-item">
      <a href="{!! url('/painel') !!}">Painel</a> -> Configurações
    </li>
</ul>

<!-- Mensagem para confirmação -->
@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<!-- Mensagem do validate -->
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
    </div>
@endif

<!-- Mensagem para erros -->
@if(session('erro'))
  <div class="alert alert-danger">{{ session('erro') }}</div>
@endif

<div class="row">
  <div class="col-md-12">
    <div class="panel-group" id="config">
      <!--Alterar Avatar-->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#config" href="#avatar">
              Alterar Avatar
            </a>
          </h4>
        </div>
        <div id="avatar" class="panel-collapse collapse in">
          <div class="panel-body">
            <form class="" action="{!! url()->current() !!}" method="post" enctype="multipart/form-data">
              {!! csrf_field() !!}
              <input type="hidden" name="tipo" value="avatar">
              <input type="file" name="avatar" id="avatar"><br/>
              <button type="submit" name="button" class="btn btn-success"> <span class="glyphicon glyphicon-floppy-disk"></span> </button>
            </form>
          </div>
        </div>
      </div>

      <!--Alterar N.E.D-->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#config" href="#n-e-d">
              Alterar Nome, Email e Descrição
            </a>
          </h4>
        </div>
        <div id="n-e-d" class="panel-collapse collapse">
          <div class="panel-body">
            <form class="" action="{!! url()->current() !!}" method="post">
              {!! csrf_field() !!}
              <input type="hidden" name="tipo" value="n.e.d">

              <div class="form-group">
                <label>Nome: </label>
                <input type="text" class="form-control" placeholder="{!! Auth::user()->name !!}" name="nome">
              </div>

              <div class="form-group">
                <label>Email: </label>
                <input type="email" class="form-control" placeholder="{!! Auth::user()->email !!}" name="email">
              </div>

              <div class="form-group">
                <label>Descrição: </label>
                <textarea type="text" class="form-control" placeholder="{!! Auth::user()->descricao !!}" name="descricao"></textarea>
              </div>

              <button type="submit" name="button" class="btn btn-success"> <span class="glyphicon glyphicon-floppy-disk"></span> </button>
            </form>
          </div>
        </div>
      </div>

      <!--Alterar Senha-->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#config" href="#senha">
              Alterar Senha
            </a>
          </h4>
        </div>
        <div id="senha" class="panel-collapse collapse">
          <div class="panel-body">
            <form class="" action="{!! url()->current() !!}" method="post">
              {!! csrf_field() !!}
              <input type="hidden" name="tipo" value="senha">

              <div class="col-md-12">
                <p></p>
                <div class="form-group">
                  <label>Senha Atual: </label>
                  <input type="text" class="form-control" name="senha_atual" placeholder="Senha Atual...">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Nova Senha: </label>
                  <input type="text" class="form-control" name=password placeholder="Nova Senha...">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Confirme a Nova Senha: </label>
                  <input type="text" class="form-control" name="password_confirmation" placeholder="Confirme a Nova Senha...">
                </div>
              </div>

              <div class="col-md-12">
                <button type="submit" name="button" class="btn btn-success"> <span class="glyphicon glyphicon-floppy-disk"></span> </button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
