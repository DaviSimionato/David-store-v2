<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\VwProduto;
use App\Models\VwProdutosRecomendados;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index() {
        return view("welcome", [
            "produtos" => VwProduto::all(),
            "produtosRecomendados" => VwProdutosRecomendados::all(),
        ]);
    }
}
