<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**Models**/
use App\User;

class UserController extends Controller
{
    public function index($filtro = null)
    {
      switch ($filtro) {
        case 'desativados':
          $user = User::onlyTrashed()->orderBy('name','asc')->get();
          break;

        default:
          $user = User::orderBy('name','asc')->get();
          break;
      }
      return view('usuarios.user.index')->with('users',$user);
    }

    public function create()
    {
      return view('usuarios.user.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
      ]);

      $user = new User;
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->level = $request->input('level');
      $user->password = bcrypt($request->input('password'));
      $user->save();

      return view('usuarios.user.create')->with('msg','Usuário Adicionado com Sucesso.');
    }

    public function destroy($id)
    {
      User::find($id)->delete();
      return back()->with('msg','Usuário Deletado Com Sucesso.');
    }
}
