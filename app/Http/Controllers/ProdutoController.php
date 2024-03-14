<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\VwProduto;
use App\Models\VwProdutosRecomendados;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index() {
        return view("index", [
            "produtos" => VwProduto::all(),
            "produtosRecomendados" => VwProdutosRecomendados::all(),
            "titulo" => "David'store222",
        ]);
    }

    public function handleBusca(Request $request) {
        $busca = $request->b;
        if(empty($busca)) {
            return redirect("/");
        }
        return redirect("/busca/{$request->b}");
    }

    public function buscar($busca) {
        return view("index", [
            "produtosRecomendados" => VwProduto::query()
                ->where("nome", "like", "%$busca%")
                ->orWhere("categoria", "like", "%$busca%")
                ->orWhere("departamento", "like", "%$busca%")
                ->orWhere("marca", "like", "%$busca%")
                ->paginate(5),
            "termo" => "busca",
        ]);
    }
}
