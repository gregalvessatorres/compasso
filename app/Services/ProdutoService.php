<?php

namespace App\Services;

use App\Models\Produto;
use Illuminate\Support\Facades\Hash;

class ProdutoService
{
    public function createProduto(array $dadosProduto): bool
    {
        $dadosCriacao = [
            'nome'    => $dadosProduto['nome'],
            'codigo'  => $dadosProduto['codigo'],
            'valor'   => $dadosProduto['valor'],
            'loja_id' => $dadosProduto['loja_id'],
        ];
        $produto      = Produto::create($dadosCriacao);

        $resposta = $produto ? true : false;
        $this->sincronizaLojas($dadosProduto['lojas'], $produto);

        return $resposta;
    }

    public function updateProduto(array $dados): bool
    {
        $resposta = false;
        $produto  = Produto::find($dados['id']);

        if ($produto) {
            $produto->nome    = $dados['nome'];
            $produto->codigo  = $dados['codigo'];
            $produto->valor   = $dados['valor'];
            $produto->loja_id = $dados['loja_id'];

            $resposta = $produto->save() ? true : false;
        }

        return $resposta;
    }

    public function getLista(): array
    {
        $produtos      = Produto::all();
        $listaProdutos = [];
        $produtos->each(function ($produto) use (&$listaProdutos) {
            $listaProdutos[] = array_merge($produto->toArray(), ['loja_nome' => $produto->loja()->first()->nome]);
        });

        return $listaProdutos;
    }

    public function deleteProduto(array $dados): bool
    {
        $resposta = false;
        $produto  = Produto::find($dados['id']);
        if ($produto) {
            $produto->loja()->detach();
            $resposta = $produto->delete();
        }

        return $resposta;
    }
}