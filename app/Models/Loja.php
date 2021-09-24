<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'endereco'
    ];

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuario_loja', 'loja_id', 'usuario_id');
    }
}
