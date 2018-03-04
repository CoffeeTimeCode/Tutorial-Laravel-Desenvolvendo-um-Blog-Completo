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
      $categoria = new Categorias;
      $categoria->nome = $request->input('nome');
      $categoria->cor = $request->input('cor');
      $categoria->slug = str_slug($request->input('nome'));
      $categoria->save();

      return redirect(url('painel/categorias'));
    }

    public function update(Request $request)
    {
      $categoria = Categorias::find($request->input('id'));
      $categoria->nome = $request->input('nome');
      $categoria->cor = $request->input('cor');
      $categoria->slug = str_slug($request->input('nome'));
      $categoria->save();

      return redirect(url('painel/categorias'));
    }

    public function destroy($id)
    {
      Categorias::find($id)->delete();

      return redirect(url('painel/categorias'));
    }
}
