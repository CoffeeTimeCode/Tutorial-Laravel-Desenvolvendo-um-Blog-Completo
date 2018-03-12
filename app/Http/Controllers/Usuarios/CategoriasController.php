<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Categorias;

class CategoriasController extends Controller
{
    public function index()
    {
      return view('usuarios.categorias.index')->with('categorias',Categorias::all());
    }

    public function store(Request $request)
    {
      $request->validate([
          'nome' => 'required|unique:categorias|min:1',
          'cor' => 'required|min:1',
      ]);

      $categoria = new Categorias;
      $categoria->nome = $request->input('nome');
      $categoria->cor = $request->input('cor');
      $categoria->slug = str_slug($request->input('nome'));
      $categoria->save();

      return back()->with('mensagem', 'Categoria criada com sucesso.');
    }

    public function update(Request $request)
    {
      $request->validate([
          'nome' => 'required|min:1',
          'cor' => 'required|min:1',
      ]);

      $categoria = Categorias::find($request->input('id'));
      $categoria->nome = $request->input('nome');
      $categoria->cor = $request->input('cor');
      $categoria->slug = str_slug($request->input('nome'));
      $categoria->save();

      return back()->with('mensagem', 'Categoria editada com sucesso.');
    }

    public function destroy($id)
    {
      Categorias::find($id)->delete();

      return back()->with('mensagem', 'Categoria deletada com sucesso.');
    }
}
