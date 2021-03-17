<?php

namespace App;

use App\Empresa;
use App\produto_venda;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
     protected $fillable = ['empresa_id', 'nome', 'precounitario', 'descricao', 'foto', 'estoque'];
     public $table = 'produtos';
     public $timestamps = false;



     public function empresa()
     {
          return $this->belongsTo(Empresa::class);
     }

     public function produto_venda()
     {
          return $this->hasMany(produto_venda::class);
     }
}
