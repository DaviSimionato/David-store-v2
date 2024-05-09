<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        "nota", 
        "user_id",
        "produto_id",
        "comentario",
        "data_review"
    ];

    public $timestamps = false;

}
