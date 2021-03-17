@extends('layout')
@section('cabecalho')
Cadastro de Produto
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

    <form action="{{route('store.produto' , [ 'empresa' => $empresa->id ])}}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8">
                <label for="Nome">Nome:</label>
                <input type="text" class="form-control mb-3" name="nome" value="{{old('nome')}}" placeholder="Nome">
            </div>

            <div class="col-4">
                <label for="Nome">Preço Unitario:</label>
                <input type="text" class="form-control mb-3" name="precounitario" value="{{old('precounitario')}}"
                    placeholder="Preço Unitario">
            </div>

            <div class="col-8">
                <label for="descricao">descrição:</label>
                <textarea type="text" class="form-control mb-3" name="descricao" value="{{old('descricao')}}"
                    placeholder="Descrição"></textarea>

            </div>

            <div class="col">
                <label for="estoque">estoque:</label>
                <input type="text" class="form-control mb-5" name="estoque" value="{{old('estoque')}}"
                    placeholder="estoque">
            </div>


            <div class="col-12">
                <label for="foto">foto:</label>
                <input type="file" class="form-control mb-5" name="foto">
            </div>



        </div>
        <input type="hidden" name="empresa_id" value="{{$empresa->id}}">

        <button type="submit" class="btn btn-primary mt-4">Cadastrar</button>

    </form>

    @endsection