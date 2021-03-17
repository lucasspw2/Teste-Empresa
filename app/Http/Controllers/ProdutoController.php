<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{



    public function index(Empresa $empresa, Request $request)
    {
        $empresa->produtos->all();


        $mensagem = $request->session()->get('mensagem');
        return view('produtos.index', compact('empresa', 'mensagem'));
    }





    public function create(Empresa $empresa)
    {


        return view('produtos.create', compact('empresa'));
    }







    public function store(ProdutoRequest $request, $empresaId)
    {
        $produto = Produto::create([
            'empresa_id' => $empresaId,
            'nome' => $request->nome,
            'precounitario' => $request->precounitario,
            'descricao' => $request->descricao,
            'foto' => $request->file('foto')->store('produtos'),
            'estoque' => $request->estoque
        ]);

        $request->session()->flash('mensagem', "Produto $produto->nome criado com sucesso");
        return redirect()->route('index.produtos', ['empresa' => $empresaId]);
    }




    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }




    public function update(Produto $produto, ProdutoRequest $request)
    {
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        if(!empty($request->file('foto'))){
            $produto->foto = $request->file('foto')->store('produtos');
        }
        $produto->estoque = $request->estoque;
        $produto->save();

        $request->session()->flash('mensagem', "Produto $produto->nome editado com sucesso");
        return redirect()->route('index.produtos', ['empresa' => $produto->empresa_id]);
    }



    public function delete(Produto $produto, Request $request)
    {
        DB::table('produto_venda')->delete();
        $produto->delete();
        $request->session()->flash('mensagem', "Produto $produto->nome excluido com sucesso");
        return redirect()->route('index.produtos', ['empresa' => $produto->empresa_id]);
    }
}
