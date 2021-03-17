<?php

namespace App;

use App\Empresa;
use App\produto_venda;
use Illuminate\Database\Eloquent\Model;

class venda extends Model
{
    protected $fillable = ['empresa_id', 'valor_total'];
    protected $table = 'venda';
    public $timestamps = true;
    


    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }


    public function produto_venda()
    {
        return $this->belongsToMany(produto_venda::class);
    }

}
