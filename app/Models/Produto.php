<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'codigo',
        'valor'
    ];

    public function loja()
    {
        return $this->belongsTo(Loja::class, 'loja_id', 'id');
    }
}
