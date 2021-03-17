<?php

namespace App;

use App\venda;
use App\Produto;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

    public $table = 'empresa';
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'razaosocial',
        'cnpj',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'email',
        'telefone'
    ];


    public function produtos()
    {

        return $this->hasMany(Produto::class);
    }

    public function vendas()
    {
        return $this->hasMany(venda::class);
    }
}
