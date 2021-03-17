@extends('layout')
<nav class="nav">
    <a class="nav-link active" href="{{route('index')}}">Empresa</a>
@section('cabecalho')

Produtos
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}

</div>
@endif


<a href="{{route('produto/cadastrar' , ['empresa' => $empresa->id]) }} " class="btn btn-outline-info">cadastrar</a>

<table class="table">


    <tr>
        <th scope="col">#Id</th>
        <th scope="col">Foto</th>
        <th scope="col">Fornecedor</th>
        <th scope="col">Nome Produto</th>
        <th scope="col">Preço Unitario</th>
        <th scope="col">Estoque</th>
        <th scope="col">Ações</th>

        @foreach($empresa->produtos as $produto)
    </tr>

    </tbody>
    <tr>

        <th scope="row">{{$produto->id}}</th>
        <td><img src="http://localhost/testeempresa/public/storage/{{$produto->foto}}" class="img-thumbnail"
                height="100px" width="100px"></td>
        <td>{{$empresa->nome}}</td>
        <td>{{$produto->nome}}</td>
        <td>{{$produto->precounitario}}</td>

        <td>{{$produto->estoque}}</td>
        <td class="d-flex ">
            <div  class="d-flex flex-row bd-highlight mb-3">
            <a href="{{route('edit.produto', ['produto' => $produto])}}" class="btn-info btn-sm mr-1 "> <i
                    class="fas fa-edit"></i></a>
                
            </div>
            <form action="{{route('delete.produto', ['produto' => $produto ]  )}}" method="post"
                onsubmit="return confirm('tem certeza que deseja excluir {{$produto->nome}}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
            </form>
    </tr>

    @endforeach
</table>
</tr>
<tbody>
    @endsection