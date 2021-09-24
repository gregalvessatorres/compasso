@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.mensagem')
        <div class="nav justify-content-center">
            <form method="POST" action="{{ $lojaEditar ? route('lojas_update') : route('lojas_create') }}">
                @csrf
                @if($lojaEditar)
                    <input type="hidden" name="id" value="{{$lojaEditar['id']}}">
                @endif
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control"
                               name="nome" value="{{ $lojaEditar ? $lojaEditar['nome'] : ""}}" required autocomplete="name" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Endereco') }}</label>

                    <div class="col-md-6">
                        <input id="endereco" type="text" class="form-control"
                               name="endereco" value="{{ $lojaEditar ? $lojaEditar['endereco'] : ""}}" required autocomplete="endereco" autofocus>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ $lojaEditar ? __('Editar') : __('Cadastrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
