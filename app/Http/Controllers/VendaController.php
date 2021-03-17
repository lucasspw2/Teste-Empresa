<?php

namespace App\Http\Controllers;

use App\venda;
use App\Empresa;
use App\produto_venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    public function index(Empresa $Empresa)
    {
        $vendas = $Empresa->vendas;

        return view('venda.index', compact('Empresa', 'vendas'));
    }

    public function create(Empresa $Empresa)
    {
        $Produtos = $Empresa->produtos;
        return view('venda.create', compact('Produtos', 'Empresa'));
    }

    public function update(Empresa $Empresa, Request $request)
    {
        DB::beginTransaction();
        $venda = venda::create([
            'empresa_id' => $Empresa->id,
            'valor_total' => $request->valor_total
        ]);



        for ($i = 0; $i < count($request->valorTotal); $i++) {
            if (DB::table('produtos')->find($request->produto_id[$i])->estoque >= $request->quantidade[$i]) {

                DB::table('produtos')
                    ->where('id', $request->produto_id[$i])->update(['estoque' => DB::table('produtos')->find($request->produto_id[$i])->estoque - $request->quantidade[$i]]);

                $produto_venda = produto_venda::create([
                    'quantidade' => $request->quantidade[$i],
                    'valorTotal' => $request->valorTotal[$i],
                    'produto_id' => $request->produto_id[$i],
                    'venda_id' => $venda->id
                ]);

                DB::commit();
            } else {
                DB::rollBack();
            }
        }
        return redirect()->route('relatorio_vendas', ['Empresa' => $Empresa->id]);
    }
}
