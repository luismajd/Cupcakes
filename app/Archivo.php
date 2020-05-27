<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    public $timestamps = false;

    protected $fillable = ['nombre_original', 'nombre_hash', 'mime', 'tamaño', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
