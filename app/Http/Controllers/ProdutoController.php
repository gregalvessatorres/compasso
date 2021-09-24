<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractController\AbstractController;
use App\Models\Loja;
use App\Models\Produto;
use App\Services\ProdutoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProdutoController extends AbstractController implements ControllerInterface
{
    public function __construct(ProdutoService $service)
    {
        $this->service           = $service;
        $this->parametroNomeBase = 'Produto';
        $this->parametroRotaBase = 'produtos';
    }

    public function form(Request $request)
    {
        $lojas         = Loja::all();
        $produtoEditar = null;
        if ($request->get('id')) {
            $produtoEditar = Produto::find($request->get('id'));
        }

        return view('produtos.form', compact('lojas', 'produtoEditar'));
    }

    public function create(Request $request)
    {
        $resposta = $this->service->createProduto($request->all());
        $mensagem = !$resposta ? ['tipo' => 'danger', 'mensagem' => 'Ocorreu um erro']
            : ['tipo' => 'success', 'mensagem' => 'Usuario criado com Sucesso'];

        Session::flash('mensagem', $mensagem);

        return Redirect::route('produtos_form');
    }

    public function update(Request $request)
    {
        $resposta = $this->service->updateProduto($request->all());
        $mensagem = $resposta ? ['tipo' => 'success', 'mensagem' => 'Atualizado com sucesso']
            : ['tipo' => 'danger', 'mensagem' => 'Ocorreu um erro'];

        return Redirect::route('produtos_form')->with('mensagem', $mensagem);
    }

    public function list(Request $request)
    {
        $listaUsuarios = $this->service->getLista();

        return view('produtos.list', compact('listaUsuarios'));
    }

    public function delete(Request $request)
    {
        $resposta = $this->service->deleteProduto($request->all());
        $mensagem = $resposta ? ['tipo' => 'success', 'mensagem' => 'Deleteado com sucesso']
            : ['tipo' => 'danger', 'mensagem' => 'Ocorreu um erro'];

        return Redirect::route('produtos_delete')->with('mensagem', $mensagem);
    }
}
