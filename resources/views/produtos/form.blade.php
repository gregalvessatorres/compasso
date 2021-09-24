@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.mensagem')
        <div class="nav justify-content-center">
            <form method="POST" action="{{ $produtoEditar ? route('produtos_update')  : route('produtos_create') }}">
                @csrf
                @if(isset($produtoEditar))
                    <input type="hidden" name="id" value="{{$produtoEditar['id']}}">
                @endif
                <div class="form-group row">
                    <label for="nome" class="col-md-4 col-form-label">{{ __('Nome') }}</label>
                    <div class="col-md-6">
                        <input id="nome" type="text" class="form-control"
                               name="nome" value="{{ $produtoEditar ? $produtoEditar['nome'] : ""}}" required autocomplete="nome" autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="codigo" class="col-md-4 col-form-label">{{ __('Codigo') }}</label>

                    <div class="col-md-6">
                        <input id="codigo" type="text" class="form-control"
                               name="codigo" value="{{ $produtoEditar ? $produtoEditar['codigo'] : ""}}" required autocomplete="codigo">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="valor" class="col-md-4 col-form-label">{{ __('Valor') }}</label>

                    <div class="col-md-6">
                        <input id="valor" type="number" class="form-control"
                               name="valor" required autocomplete="valor" value="{{ $produtoEditar ? $produtoEditar['valor'] : ""}}">
                    </div>
                </div>
                @if(isset($lojas))
                    <div class="form-group row">
                        <label for="lojas" class="col-md-4 col-form-label">{{ __('Loja do produto') }}</label>
                        <div class="col-md-6">
                        @foreach($lojas as $loja)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                       {{ $produtoEditar && ($produtoEditar['loja_id'] && $loja['id'] == $produtoEditar['loja_id'])? "checked" : ""}}
                                       id="loja{{$loja['id']}}" name="loja_id" value="{{$loja['id']}}">
                                <label class="form-check-label" for="loja{{$loja['id']}}">{{$loja['nome']}}</label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                @endif
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ $produtoEditar ? __('Editar') : __('Cadastrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
