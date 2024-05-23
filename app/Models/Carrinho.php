<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "user_id",
        "produto_id"
    ];

    public $timestamps = false;

    public static function getQtd() {
        if(!is_null(auth()->user())) {
            $qtd = self::query()->where("user_id", auth()->id())
            ->count();
        }else {
            $qtd = 0;
        }
        return $qtd;
    }
}
