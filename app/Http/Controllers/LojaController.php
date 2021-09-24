<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractController\AbstractController;
use App\Models\Loja;
use App\Services\LojaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LojaController extends AbstractController implements ControllerInterface
{
    public function __construct(LojaService $service)
    {
        $this->service = $service;
        $this->parametroNomeBase = 'Lojas';
        $this->parametroRotaBase = 'lojas';
    }

    public function form(Request $request)
    {
        $lojaEditar = null;
        if ($request->get('id')) {
            $lojaEditar = Loja::find($request->get('id'));
        }

        return view('lojas.form', compact('lojaEditar'));
    }

    public function create(Request $request)
    {
        $resposta     = $this->service->createLoja($request->except('_token'));
        $mensagem = !$resposta ? ['tipo' => 'danger', 'mensagem' => 'Ocorreu um erro']
            : ['tipo' => 'success', 'mensagem' => 'Loja criado com Sucesso'];

        Session::flash('mensagem', $mensagem);

        return Redirect::route('lojas_form');
    }

    public function update(Request $request)
    {
        $resposta = $this->service->updateLoja($request->all());

        $mensagem = $resposta ? ['tipo' => 'success', 'mensagem' => 'Atualizado com sucesso']
            : ['tipo' => 'danger', 'mensagem' => 'Ocorreu um erro'];

        return Redirect::route('lojas_form')->with('mensagem', $mensagem);
    }

    public function list(Request $request)
    {
        $lojas = Loja::all()->toArray();

        return view('lojas.list', compact('lojas'));
    }

    public function delete(Request $request)
    {
        $resposta = $this->service->deleteLoja($request->get('id'));
        $mensagem = $resposta ? ['tipo' => 'success', 'mensagem' => 'Deletado com sucesso']
            : ['tipo' => 'danger', 'mensagem' => 'Ocorreu um erro'];

        Session::flash('mensagem', $mensagem);

        return Redirect::route('lojas_delete')->with('mensagem', $mensagem);
    }
}
