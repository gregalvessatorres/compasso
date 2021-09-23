<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller implements ControllerInterface
{

    public function index(Request $request)
    {
        return view('usuarios.menu')->with('mensagem', $request->get('mensagem'));
    }

    public function create(Request $request)
    {
        $usuario  = Usuario::create($request->all());
        $mensagem = empty($usuario) ? ['tipo' => 'erro', 'mensagem' => 'Ocorreu um erro']
                                    : ['tipo' => 'sucesso', 'mensagem' => 'Usuario criado com Sucesso'];

        return Redirect::route('usuarios_create')->with('mensagem', $mensagem);
    }

    public function update(Request $request)
    {
        $usuario = Usuario::find($request->get('id'));

        $mensagem = $usuario->save() ? ['tipo' => 'sucesso', 'mensagem' => 'Atualizado com sucesso']
                                    : ['tipo' => 'erro', 'mensagem' => 'Ocorreu um erro'];

        return Redirect::route('usuarios_update')->with('mensagem', $mensagem);
    }

    public function list(Request $request)
    {
        $usuarios      = Usuario::all();
        $listaUsuarios = [];
        $usuarios->each(function ($usuario) use (&$listaUsuarios) {
            $listaUsuarios = array_merge($usuario->toArray(), $usuario->lojas()->get()->toArray());
        });

        return view('usuarios.list', compact('listaUsuarios'));
    }

    public function delete(Request $request)
    {
        $usuario = Usuario::find($request->get('id', null));
        $usuario->delete();

        $mensagem = $usuario->save() ? ['tipo' => 'sucesso', 'mensagem' => 'Deleteado com sucesso']
            : ['tipo' => 'erro', 'mensagem' => 'Ocorreu um erro'];

        return Redirect::route('usuarios_delete')->with('mensagem', $mensagem);
    }
}
