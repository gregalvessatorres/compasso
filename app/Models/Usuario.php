<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasFactory, HasApiTokens;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nome',
        'email',
        'senha',
    ];
    
    public function getAuthPassword()
    {
        return $this->senha;
    }
    public function lojas()
    {
        return $this->belongsToMany(Loja::class, 'usuario_loja', 'usuario_id', 'loja_id');
    }
}
