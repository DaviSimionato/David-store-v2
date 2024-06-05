<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itenspedido extends Model
{
    use HasFactory;

    protected $fillable = [
        "produto_id",
        "numero_pedido"
    ];

    public $timestamps = false;
}
