@extends('usuarios.layouts.app')

@section('content')
<ul class="list-group">
  <li class="list-group-item"><h4 class="text-center">Tags</h3></li>
</ul>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Gerenciar Tags</h3>
      </div>
      <div class="panel-body">
        <form class="" action="{{url()->current()}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label>Tags</label>
            <input type="text" class="form-control" name="tags">
            <p class="help-block">Digite as tags separada por vírgula: exemplo: laravel,php</p>
          </div>
          <button type="submit" class="btn btn-success">Adicionar</button>
        </form>
      </div>
      <div class="panel-footer" style="padding:0px;">
        <table class="table">
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data</th>
            <th></th>
          </tr>
            @foreach($tags as $tag)
            <tr>
              <td>{{$tag->id}}</td>
              <td>{{$tag->nome}}</td>
              <td>{{$tag->created_at}}</td>
              <td>
                <a href="#" class="btn btn-sm btn-danger">Deletar</a>
              </td>
            </tr>
            @endforeach
        </table>
      </div>
    </div>

  </div>
</div>
@endsection
