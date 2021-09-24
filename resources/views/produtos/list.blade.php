@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    @if(isset($listaProdutos))
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Loja do Produtos</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listaProdutos as $produto)
                                <tr>
                                    <th scope="row">{{$produto['id']}}</th>
                                    <td>{{$produto['nome']}}</td>
                                    <td>{{$produto['codigo']}}</td>
                                    <td>{{$produto['valor']}}</td>
                                    <td>{{$produto['loja_nome']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
        </div>
    </div>
@endsection
