@extends('layout')
@section('cabecalho')
Bem-Vindo
<p class="lead">Cadastre sua Empresa</p>
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

    <form method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <label for="Nome">Nome:</label>
                <input type="text" class="form-control mb-3" name="nome" value="{{old('nome')}}" placeholder="Nome">
            </div>

            <div class="col-6">
                <label for="RazaoSocial">Razão Social:</label>
                <input type="text" class="form-control mb-3" name="razaosocial" value="{{old('razaosocial')}}"
                    placeholder="Razão Social">

            </div>


            <div class="col">
                <label for="CNPJ">CNPJ:</label>
                <input type="text" class="form-control mb-5" name="cnpj" value="{{old('cnpj')}}" placeholder="CNPJ">


            </div>
        </div>

        <h3>Endereço</h3>


        <div class="form-row">
            <div class="col-6">
                <label for="endereco">Rua:</label>
                <input type="text" class="form-control" name="rua" value="{{old('rua')}}" placeholder="Rua/Avenida">

            </div>

            <div class="col-2 ">
                <label for="numero">Numero:</label>
                <input type="text" class="form-control" name="numero" value="{{old('numero')}}" placeholder="Numero">

            </div>

            <div class="col-4 ">
                <label for="Bairro">Bairro:</label>
                <input type="text" class="form-control" name="bairro" value="{{old('bairro')}}" placeholder="Bairro">
            </div>

        </div>


        <div class="form-row mt-3">
            <div class="col-5">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" name="cidade" value="{{old('cidade')}}" placeholder="cidade">
            </div>

            <div class="col-3">
                <label for="Estado">Estado:</label>
                <input type="text" class="form-control" name="estado" value="{{old('estado')}}" placeholder="Estado">
            </div>

            <div class="col-4">
                <label for="Estado">CEP:</label>
                <input type="text" class="form-control  mb-4" name="cep" value="{{old('cep')}}" placeholder="CEP">

            </div>

        </div>

        <h3>Contato</h3>

        <div class="form-row mt-1">
            <div class="col-6">
                <label for="Estado">Email:</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">

            </div>

            <div class="col-6">

                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" name="telefone" value="{{old('telefone')}}"
                    placeholder="(xxx)xxxxx-xxxx">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Cadastrar</button>

    </form>

    @endsection