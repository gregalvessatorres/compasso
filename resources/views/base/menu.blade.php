@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="{{url("/{$rotaBase}/form")}}">Cadastrar {{$nomeBase}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("{$rotaBase}_list")}}">Listar {{$nomeBase}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url("/$rotaBase/update")}}">Atualizar {{$nomeBase}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url("/$rotaBase/delete")}}">Deletar {{$nomeBase}}</a>
            </li>
        </ul>
    </div>
@endsection
