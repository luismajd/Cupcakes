<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Postre extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen'];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class)->withPivot('cantidad');
    }

    public function getImporteAttribute()
    {
        return $this->precio * $this->pivot->cantidad;
    }
}
