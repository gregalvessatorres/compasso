@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="nav justify-content-center">
            <form method="GET" action="{{ route("{$rotaBase}_form") }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __("Id do {$nomeBase}") }}</label>
                    <div class="col-md-6">
                        <input id="id" type="text" class="form-control"
                               name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Buscar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

