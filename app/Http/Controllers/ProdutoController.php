<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\VwProduto;
use App\Models\VwProdutosRecomendados;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index() {
        return view("layout", [
            "produtos" => VwProduto::all(),
            "produtosRecomendados" => VwProdutosRecomendados::all(),
            "titulo" => "David'store",
        ]);
    }

    public function busca(Request $request) {
        return view("layout", [
            "produtosRecomendados" => VwProduto::buscar($request->b)->paginate(10),
            "termo" => "busca",
        ]);
    }
}
