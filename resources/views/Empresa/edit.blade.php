@extends('layout')
@section('cabecalho')
Editar Cadastro
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

    <form action="{{route('update', ['empresa' => $empresa->id]) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-12">
                <label for="Nome">Nome:</label>
                <input type="text" class="form-control mb-3" name="nome" value="{{$empresa->nome}}">
            </div>

            <div class="col-6">
                <label for="RazaoSocial">Razão Social:</label>
                <input type="text" class="form-control mb-3" name="razaosocial" value="{{$empresa->razaosocial}}">

            </div>


            <div class="col">
                <label for="CNPJ">CNPJ:</label>
                <input type="text" class="form-control mb-5" name="cnpj" value="{{$empresa->cnpj}}">


            </div>
        </div>

        <h3>Endereço</h3>


        <div class="form-row">
            <div class="col-6">
                <label for="endereco">Rua:</label>
                <input type="text" class="form-control" name="rua" value="{{$empresa->rua}}">

            </div>

            <div class="col-2 ">
                <label for="numero">Numero:</label>
                <input type="text" class="form-control" name="numero" value="{{$empresa->numero}}">

            </div>

            <div class="col-4 ">
                <label for="Bairro">Bairro:</label>
                <input type="text" class="form-control" name="bairro" value="{{$empresa->bairro}}">
            </div>

        </div>


        <div class="form-row mt-3">
            <div class="col-5">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" name="cidade" value="{{$empresa->cidade}}">
            </div>

            <div class="col-3">
                <label for="Estado">Estado:</label>
                <input type="text" class="form-control" name="estado" value="{{$empresa->estado}}">
            </div>

            <div class="col-4">
                <label for="Estado">CEP:</label>
                <input type="text" class="form-control  mb-4" name="cep" value="{{$empresa->cep}}">

            </div>

        </div>

        <h3>Contato</h3>

        <div class="form-row mt-1">
            <div class="col-6">
                <label for="Estado">Email:</label>
                <input type="email" class="form-control" name="email" value="{{$empresa->email}}">

            </div>

            <div class="col-6">

                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" name="telefone" value="{{$empresa->telefone}}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">editar</button>



    </form>

    @endsection