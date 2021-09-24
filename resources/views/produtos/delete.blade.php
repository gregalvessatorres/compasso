@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.mensagem')
        <div class="nav justify-content-center">
            <form method="POST" action="{{ route('usuarios_delete') }}">
                <input type="hidden" name="_method" value="delete">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Id do usuário') }}</label>
                    <div class="col-md-6">
                        <input id="id" type="text" class="form-control @error('id') is-invalid @enderror"
                               name="id" value="{{ old('id') }}" required autocomplete="name" autofocus>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Deletar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
