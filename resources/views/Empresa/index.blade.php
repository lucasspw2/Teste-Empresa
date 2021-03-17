@extends('layout')
@section('cabecalho')
Empresa
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}

</div>
@endif

<a href="{{route('create')}}" class="btn btn-outline-info">cadastrar</a>

<table class="table">


    <tr>
        <th scope="col">#Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Razão Social</th>
        <th scope="col">Telefone</th>
        <th scope="col">Ações</th>


    </tr>

    @foreach($empresas as $empresa)
    <tbody>
        <tr>
            <th scope="row">{{$empresa->id}}</th>
            <td>{{$empresa->nome}}</td>
            <td>{{$empresa->razaosocial}}</td>
            <td>{{$empresa->telefone}}</td>
            <td class="d-flex"><a href="empresa/{{$empresa->id}}/produtos" class="btn btn-primary btn-sm">
                    <i class="fas fa-dolly"></i></a>


                <a href="{{route('relatorio_vendas' , ['Empresa' => $empresa->id])}}"
                    class="btn btn-success btn-sm ml-1"> <i class="fas fa-chart-bar"></i></button> </a>

                <a href="empresa/editar/{{$empresa->id}}" class="btn btn-info btn-sm ml-1"> 
                    <i class="fas fa-edit"></i></a>

                    
                <form action="empresa/remover/{{$empresa->id}}" method="post"
                    onsubmit="return confirm('tem certeza que deseja excluir {{$empresa->nome}}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm ml-1"><i class="far fa-trash-alt "></i></button>
                </form>
        </tr>
        @endforeach


    </tbody>

</table>
@endsection