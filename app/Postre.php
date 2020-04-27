<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postre extends Model
{
    public $timestamps = false;

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class);
    }
}
