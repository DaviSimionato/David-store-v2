<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        "numero_pedido",
        "total_pedido",
        "data_pedido",
        "user_id",
        "metodo_pagamento"
    ];

    public $timestamps = false;
}
