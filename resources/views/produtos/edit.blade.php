@extends('layout')
@section('cabecalho')
Editar Produto
@endsection

@section('conteudo')



@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
</div>

<div class="container">
    <div class="d-flex justify-content-center mb-3">
        <img src="http://localhost/testeempresa/public/storage/{{$produto->foto}}" class="img-thumbnail" height="500px"
            width="500px">
    </div>
    <form action="{{route('update.produto', ['produto' => $produto->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8">
                <label for="Nome">Nome:</label>
                <input type="text" class="form-control mb-3" name="nome" value="{{$produto->nome}}">
            </div>
            <div class="col-4">
                <label for="precounitario">Preço Unitario:</label>
                <input type="text" class="form-control mb-3" name="precounitario" value="{{$produto->precounitario}}">
            </div>

            <div class="col-8">
                <label for="descricao">descrição:</label>
                <textarea type="text" class="form-control mb-3" name="descricao">{{$produto->descricao}}</textarea>
            </div>

            <div class="col">
                <label for="estoque">estoque:</label>
                <input type="text" class="form-control mb-5" name="estoque" value="{{$produto->estoque}}">
            </div>

            <div class="col-12">
                <label for="foto">foto:</label>
                <input type="file" class="form-control mb-5" name="foto" >


            </div>


        </div>

        <button type="submit" class="btn btn-primary mt-4">Editar Produto</button>

    </form>

    @endsection