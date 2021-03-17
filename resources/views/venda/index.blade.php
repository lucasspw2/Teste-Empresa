@extends('layout')
<nav class="nav">
  <a class="nav-link active" href="{{route('index')}}">Empresa</a>
@section('cabecalho')
Vendas
@endsection

@section('conteudo')


<h1 class="mb-3">{{$Empresa->nome}}</h1>
<a href="{{Route('create_venda' , ['Empresa' => $Empresa->id])}}" class="btn btn-outline-info">cadastrar</a>
<table class="table">
  <tr>
    <th scope="col">#Numero</th>
    <th scope="col">Data</th>
    <th scope="col">Valor Total</th>
  </tr>

  @foreach($vendas as $venda)
  <tr>
    <th scope="row">{{$venda->id}}</th>
    <td>{{date('d/m/Y H:i', strtotime($venda->created_at)) }}</td>
    <td>{{$venda->valor_total}}</td>


    @endforeach

    @endsection