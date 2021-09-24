<?php

namespace App\Services;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    public function createUsuario(array $dadosUsuario): bool
    {
        $dadosCriacao = [
            'nome'  => $dadosUsuario['nome'],
            'email' => $dadosUsuario['email'],
            'senha' => Hash::make($dadosUsuario['senha']),
        ];
        $usuario      = Usuario::create($dadosCriacao);

        $resposta = $usuario ? true : false;
        if(isset($dadosUsuario['lojas'])) {
            $this->sincronizaLojas($dadosUsuario['lojas'], $usuario);
        }

        return $resposta;
    }

    public function updateUsuario(array $dados): bool
    {
        $resposta = false;
        $usuario  = Usuario::find($dados['id']);

        if ($usuario) {
            $usuario->nome  = $dados['nome'];
            $usuario->email = $dados['email'];
            $usuario->senha = Hash::make($dados['senha']);

            $resposta = $usuario->save() ? true : false;
            $this->sincronizaLojas($dados['lojas'], $usuario);
        }

        return $resposta;
    }

    private function sincronizaLojas(array $lojas, $usuario): void
    {
        if (!empty($lojas)) {
            $usuario->lojas()->sync($lojas);
        }
    }

    public function getLista(): array
    {
        $usuarios      = Usuario::all();
        $listaUsuarios = [];
        $usuarios->each(function ($usuario) use (&$listaUsuarios) {
            $lojas           = $usuario->lojas()->pluck('nome')->toArray();
            $listaUsuarios[] = array_merge($usuario->toArray(), ['lojas' => implode(',', $lojas)]);
        });

        return $listaUsuarios;
    }

    public function getUsuarioELojas(int $id)
    {
        $usuarioEditar = Usuario::find($id);
        $lojas         = $usuarioEditar->lojas()->pluck('lojas.id')->toArray();

        return array_merge($usuarioEditar->toArray(), ['lojas' => $lojas]);
    }

    public function deleteUsuario(array $dados): bool
    {
        $resposta = false;
        $usuario  = Usuario::find($dados['id']);
        if ($usuario) {
            $usuario->lojas()->detach();
            $resposta = $usuario->delete();
        }

        return $resposta;
    }
}