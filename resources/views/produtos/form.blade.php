@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.mensagem')
        <div class="nav justify-content-center">
            <form method="POST" action="{{ $usuarioEditar ? route('usuarios_update')  : route('usuarios_create') }}">
                @csrf
                @if(isset($usuarioEditar))
                    <input type="hidden" name="id" value="{{$usuarioEditar['id']}}">
                @endif
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control"
                               name="nome" value="{{ $usuarioEditar ? $usuarioEditar['nome'] : ""}}" required autocomplete="name" autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control"
                               name="email" value="{{ $usuarioEditar ? $usuarioEditar['email'] : ""}}" required autocomplete="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control"
                               name="senha" required autocomplete="new-password">
                    </div>
                </div>
                @if(isset($lojas))
                    <div class="form-group row">
                        <label for="lojas" class="col-md-4 col-form-label text-md-right">{{ __('Lojas que o usuario pertence') }}</label>
                        <div class="col-md-6">
                        @foreach($lojas as $loja)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox"
                                       {{ $usuarioEditar && isset($usuarioEditar['lojas']) && in_array($loja['id'], $usuarioEditar['lojas'])? "checked" : ""}}
                                       id="lojas[{{$loja['id']}}]" name="lojas[{{$loja['id']}}]" value="{{$loja['id']}}">
                                <label class="form-check-label" for="lojas[{{$loja['id']}}]">{{$loja['nome']}}</label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                @endif
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ $usuarioEditar ? __('Editar') : __('Cadastrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
