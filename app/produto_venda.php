<?php

namespace App;

use App\venda;
use App\Empresa;
use App\Produto;
use Illuminate\Database\Eloquent\Model;

class produto_venda extends Model
{
    protected $fillable = [
        'quantidade',
        'valorTotal',
        'produto_id',
        'venda_id'
    ];

    public $timestamps = false;

    protected $table = 'produto_venda';


    public function produto()
    {
        return $this->belongsToMany(Produto::class);
    }

    public function vendas()
    {
        return $this->belongsToOne(venda::class);
    }
}
