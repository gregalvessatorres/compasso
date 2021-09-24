@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    @if(isset($lojas))
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Endereco</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lojas as $loja)
                                <tr>
                                    <th scope="row">{{$loja['id']}}</th>
                                    <td>{{$loja['nome']}}</td>
                                    <td>{{$loja['endereco']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
        </div>
    </div>
@endsection
