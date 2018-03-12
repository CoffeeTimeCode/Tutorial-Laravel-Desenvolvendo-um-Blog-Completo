@extends('usuarios.layouts.app')

@section('content')
<ul class="list-group">
  <li class="list-group-item"><h4 class="text-center">Tags</h3></li>
</ul>

<div class="row">
  <div class="col-md-12">

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  @if(session('mensagem'))
  <div class="alert alert-success">{{session('mensagem')}}</div>
  @endif

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Gerenciar Tags</h3>
      </div>
      <div class="panel-body">
        @if(Auth::user()->level >= 2)
          <form class="" action="{{url()->current()}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label>Tags</label>
              <input type="text" class="form-control" name="tags">
              <p class="help-block">Digite as tags separada por vírgula: exemplo: laravel,php</p>
            </div>
            <button type="submit" class="btn btn-success">Adicionar</button>
          </form>
        @else
          <p>Você não tem permissão.</p>
        @endif
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
                @if(Auth::user()->level >= 2)
                  <a onclick="editarTag('{{$tag->id}}','{{$tag->nome}}')" class="btn btn-sm btn-warning">Editar</a>
                  <a href="{{url('painel/tags/deletar/'.$tag->id)}}" class="btn btn-sm btn-danger">Deletar</a>
                @else
                  Você não tem permissão.
                @endif
              </td>
            </tr>
            @endforeach
        </table>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">

function editarTag($id, $tag) {
  $('#id').val($id);
  $('#tag').val($tag);

  $('#editarTag').modal('toggle');
}

</script>

<div class="modal fade" id="editarTag" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{url()->current().'/editar'}}" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="">Editar Tag</h4>
        </div>
        <div class="modal-body">

            {{ csrf_field() }}
            <input type="hidden" id="id" name="id">
            <div class="form-group">
              <label for="">Tag</label>
              <input type="text" class="form-control" id="tag" name="tag" placeholder="">
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Editar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
