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

    public function handleBusca(Request $request) {
        $busca = $request->b;
        if(empty($busca)) {
            return redirect("/");
        }
        return redirect("/busca/{$request->b}");
    }

    public function buscar($busca) {
        return view("layout", [
            "produtosRecomendados" => VwProduto::query()
                ->where("nome", "like", "%$busca%")
                ->orWhere("categoria", "like", "%$busca%")
                ->orWhere("departamento", "like", "%$busca%")
                ->orWhere("marca", "like", "%$busca%")
                ->paginate(10),
            "termo" => "busca",
        ]);
    }
}