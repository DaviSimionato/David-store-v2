<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VwProduto extends Model
{
    use HasFactory;

    protected $table = "vwProdutos";

    public function scopeBuscar($query, $busca) {
        // if(empty($busca)) {
        //     return redirect("/");
        // }
        $query->where("nome", "like", "%$busca%")
            ->orWhere("categoria", "like", "%$busca%")
            ->orWhere("departamento", "like", "%$busca%")
            ->orWhere("marca", "like", "%$busca%");
    }
}
