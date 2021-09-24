@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    @if(isset($listaUsuarios))
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Lojas que o Usuario pertence</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listaUsuarios as $usuario)
                                <tr>
                                    <th scope="row">{{$usuario['id']}}</th>
                                    <td>{{$usuario['nome']}}</td>
                                    <td>{{$usuario['email']}}</td>
                                    <td>{{$usuario['lojas']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
        </div>
    </div>
@endsection
