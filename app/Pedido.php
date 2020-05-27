<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['fecha_entrega','comentarios','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postres()
    {
        return $this->belongsToMany(Postre::class)->withPivot('cantidad');
    }
}
