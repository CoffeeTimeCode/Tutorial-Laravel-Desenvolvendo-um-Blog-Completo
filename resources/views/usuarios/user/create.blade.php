@extends('usuarios.layouts.app')

@section('content')
<ul class="list-group">
  <li class="list-group-item"><h4 class="text-center">Criar Usuário</h4></li>
    <li class="list-group-item">
      <a href="{!! url('/painel') !!}">Painel</a> -> Criar Usuário
    </li>
</ul>

@if(isset($msg))
<div class="alert alert-success">
  {!! $msg !!}
</div>
@endif

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <form method="POST" action="{!! url('/painel/criar-usuario') !!}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="">Nome:</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="">Email:</label>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="">Level:</label>
                <select name="level" class="form-control">
                  <option value="0">Leitor</option>
                  <option value="1">Revisor</option>
                  <option value="2">Admin</option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="">Senha:</label>
                <input type="password" class="form-control" name="password" required >
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="">Confirmar Senha:</label>
                <input type="password" class="form-control" name="password_confirmation" required >
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-success">
              + Adicionar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
