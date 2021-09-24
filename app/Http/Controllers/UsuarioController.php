<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractController\AbstractController;
use App\Models\Loja;
use App\Services\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsuarioController extends AbstractController implements ControllerInterface
{
    public function __construct(UsuarioService $service)
    {
        $this->service = $service;
        $this->parametroNomeBase = 'Usuario';
        $this->parametroRotaBase = 'usuarios';
    }

    public function form(Request $request)
    {
        $lojas         = Loja::all()->toArray();
        $usuarioEditar = null;
        if ($request->get('id')) {
            $usuarioEditar = $this->service->getUsuarioELojas($request->get('id'));
        }

        return view('usuarios.form', compact('lojas', 'usuarioEditar'));
    }

    public function create(Request $request)
    {
        $resposta = $this->service->createUsuario($request->all());
        $mensagem = !$resposta ? ['tipo' => 'danger', 'mensagem' => 'Ocorreu um erro']
            : ['tipo' => 'success', 'mensagem' => 'Usuario criado com Sucesso'];

        return Redirect::route('usuarios_form')->with('mensagem', $mensagem);
    }

    public function update(Request $request)
    {
        $resposta = $this->service->updateUsuario($request->all());
        $mensagem = $resposta ? ['tipo' => 'success', 'mensagem' => 'Atualizado com sucesso']
            : ['tipo' => 'danger', 'mensagem' => 'Ocorreu um erro'];

        return Redirect::route('usuarios_form')->with('mensagem', $mensagem);
    }

    public function list(Request $request)
    {
        $listaUsuarios = $this->service->getLista();

        return view('usuarios.list', compact('listaUsuarios'));
    }

    public function delete(Request $request)
    {
        $resposta = $this->service->deleteUsuario($request->all());
        $mensagem = $resposta ? ['tipo' => 'success', 'mensagem' => 'Deleteado com sucesso']
            : ['tipo' => 'danger', 'mensagem' => 'Ocorreu um erro'];

        return Redirect::route('usuarios_delete')->with('mensagem', $mensagem);
    }
}
