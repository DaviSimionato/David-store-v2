<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Marca;
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
            "marcas" => Marca::all(),
            "departamentos" => Departamento::all(),
        ]);
    }

    public function handleBusca(Request $request) {
        if(empty($request->b)) {
            return redirect("/");
        }
        $busca = str_replace(" ", "-", $request->b);
        return redirect("/busca/{$busca}");
    }

    public function buscar($busca) {
        $busca = str_replace("-", " ", $busca);
        return view("index", [
            "produtosRecomendados" => VwProduto::query()
                ->where("nome", "like", "%$busca%")
                ->orWhere("categoria", "like", "%$busca%")
                ->orWhere("departamento", "like", "%$busca%")
                ->orWhere("marca", "like", "%$busca%")
                ->paginate(10),
            "termo" => "busca",
            "marcas" => Marca::all(),
            "departamentos" => Departamento::all(),
        ]);
    }
}
