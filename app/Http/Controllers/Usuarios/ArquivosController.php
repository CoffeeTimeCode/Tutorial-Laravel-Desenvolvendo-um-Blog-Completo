<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Arquivos;

class ArquivosController extends Controller
{
    public function index()
    {
      return view('usuarios.arquivos.index')->with('arquivos', Arquivos::get());
    }

    public function store(Request $request)
    {
      $request->validate([
          'arquivo' => 'required',
      ]);

      $arquivo = new Arquivos;
      if(is_null($request->input('nome'))){
        $arquivo->nome = str_replace('.'.$request->arquivo->extension(),'',$request->arquivo->getClientOriginalName());
      }else{
        $arquivo->nome = $request->input('nome');
      }
      $arquivo->tamanho = $request->arquivo->getClientSize();
      $arquivo->tipo = $request->arquivo->extension();
      $arquivo->caminho = 'assets/arquivos/'.$request->arquivo->storeAs('', str_slug($arquivo->nome).'.'.$arquivo->tipo, 'upl_arquivos');
      $arquivo->save();

      return back()->with('mensagem', "Uplaod do arquivo '{$arquivo->nome}' realizado com sucesso.");
    }
}
