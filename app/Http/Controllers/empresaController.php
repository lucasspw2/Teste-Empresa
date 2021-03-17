<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Produto;
use App\produto_venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EmpresaRequest;


class empresaController extends Controller
{
    public function index(Request $request)
    {
        $empresas = Empresa::all();
        $mensagem = $request->session()->get('mensagem');
        return view('empresa.index', compact('empresas', 'mensagem'));
    }


    public function create()
    {
        return view('Empresa.create');
    }

    public function store(EmpresaRequest $request)
    {
        $empresa = Empresa::create([
            'nome' => $request->nome,
            'razaosocial' => $request->razaosocial,
            'cnpj' => $request->cnpj,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'email' => $request->email,
            'telefone' => $request->telefone
        ]);
        $request->session()->flash('mensagem', 'Empresa cadastrada com Sucesso');

        return redirect()->route('index');
    }


    public function editar(Empresa $empresa)
    {

        return view('empresa.edit', ['empresa' => $empresa]);
    }


    public function update(Empresa $empresa, EmpresaRequest $request)
    {
        $empresa->nome = $request->nome;
        $empresa->razaosocial = $request->razaosocial;
        $empresa->cnpj =  $request->cnpj;
        $empresa->rua = $request->rua;
        $empresa->numero = $request->numero;
        $empresa->bairro = $request->bairro;
        $empresa->cidade = $request->cidade;
        $empresa->estado = $request->estado;
        $empresa->cep = $request->cep;
        $empresa->email = $request->email;
        $empresa->telefone = $request->telefone;
        $empresa->save();

        $request->session()->flash('mensagem', "Empresa $empresa->nome editada com Sucesso");
        return redirect()->route('index');
    }



    public function destroy(Empresa $empresa)
    {
        DB::table('produto_venda')->delete();
        $empresa->produtos()->delete();
        $empresa->vendas()->delete();
        $empresa->delete();
        return redirect()->route('index');
    }
}
