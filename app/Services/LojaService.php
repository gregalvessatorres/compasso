<?php

namespace App\Services;

use App\Models\Loja;
use Illuminate\Support\Facades\Hash;

class LojaService
{
    public function createLoja(array $dadosLoja): bool
    {
        $loja = Loja::create($dadosLoja);

        return $loja ? true : false;
    }

    public function updateLoja(array $dados): bool
    {
        $resposta = false;
        $loja     = Loja::find($dados['id']);

        if ($loja) {
            $loja->nome  = $dados['nome'];
            $loja->endereco = $dados['endereco'];

            $resposta = $loja->save() ? true : false;
        }

        return $resposta;
    }

    public function deleteLoja(int $id): bool
    {
        $resposta = false;
        $loja     = Loja::find($id);
        if ($loja) {
            $loja->usuarios()->detach();
            $resposta = $loja->delete();
        }

        return $resposta;
    }
}