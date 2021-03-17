@extends('layout')
<nav class="nav">
    <a class="nav-link active" href="{{route('index')}}">Empresa</a>
@section('cabecalho')
Venda
@endsection

@section('conteudo')

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    adicionarProduto = function(){
    	let idProduto = $('select[name=produto] option').filter(':selected').val();
    	let produtos = idProduto.split("_");
        let incrementoProduto = $('#produtos div').length;
        
    	let htmlTable = "<tr id='produtoTabela_" + incrementoProduto + "' class='" + idProduto + "'>" +
    			"<td>"+produtos[0]+"</td>" +
    			"<td>"+produtos[1]+"</td>" +
    			"<td>"+produtos[2]+"</td>" +
    			"<td><input onChange='validarQuantidadeEstoque(this)' type='number' class='quantidade'></input>" +
                "<td class='valorTotal'>0</td>" +
		"</tr>";
        $("#produtosTabela").append(htmlTable);
        
        let htmlInput =
            "<div id='produto_" + incrementoProduto + "'>"+
        	"	<input type='hidden' name='produto_id[]' value='" + produtos[0] + "'/>"+
            "	<input type='hidden' class='valorTotalProduto' name='valorTotal[]' value='0'/>"+
            "   <input type='hidden' class='quantidadeProduto' name='quantidade[]' value='0' />"+
            "</div>";

        $("#produtos").append(htmlInput);
  	}
    
    validarQuantidadeEstoque = function(elemento) {
    	let itensProduto = $(elemento).closest('tr').attr('class').split("_");
        let idElementoProduto = $(elemento).closest('tr').attr('id').split('_')[1];
        let idInputsProduto = 'produto_'+idElementoProduto;
        if(parseInt($(elemento).val()) > parseInt(itensProduto[3])){
        	alert("Quantidade do produto maior que a quantidade em estoque.")
        }
        let valorTotalProduto = parseFloat($(elemento).val())*parseFloat(itensProduto[2].replace(',' , '.'));
        $(elemento).closest('tr').find('.valorTotal').text(valorTotalProduto.toString().replace('.' , ','));
        $('#'+idInputsProduto).find('.valorTotalProduto').val(valorTotalProduto);
        $('#'+idInputsProduto).find('.quantidadeProduto').val(parseInt($(elemento).val()));
        
        let total =0;

        $("#produtos").find(".valorTotalProduto").each(function (index, element) {
            total = total + parseFloat($(element).val());
        });
        $('input[name=valor_total]').val(total)
        $('#labelValorTotal').text('Valor Total: '+ total)
	};
</script>

<form action="{{route('resultado' , ['Empresa' => $Empresa->id])}}" method="post">
    @csrf
    <div>
        <select name="produto">
            @foreach($Produtos as $produto)
            <option value="{{$produto->id}}_{{$produto->nome}}_{{$produto->precounitario}}_{{$produto->estoque}}">
                {{$produto->nome}}</option>
            @endforeach
        </select>
        <button type="button" class="btn btn-primary btn-sm" onclick="adicionarProduto()">Incluir Produto</button>
    </div>
    <div class="list-group">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Valor Unitário</th>
                    <th>Quantidade</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
            <tbody id="produtosTabela">
            </tbody>
        </table>
    </div>
    <div id="produtos" />
    <input type="hidden" name="empresa_id" value="{{$Empresa->id}}">
    <input type="hidden" name="valor_total" value="0">
    <button type="submit" class="btn btn-primary btn-sm">Comprar</button>

    <label class="float-right" id="labelValorTotal"> Valor Total:0 </label>
</form>
</div>
@endsection