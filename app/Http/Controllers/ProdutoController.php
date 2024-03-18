<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Marca;
use App\Models\Produto;
use App\Models\VwHistorico;
use App\Models\VwProduto;
use App\Models\VwProdutosRecomendados;
use App\Models\VwReview;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index() {
        if(auth()) {
            $prodsRecentes = VwHistorico::where("user_id", auth()->id())
            ->take(25)
            ->get();
        }
        return view("index", [
            "produtos" => VwProduto::all(),
            "produtosRecomendados" => VwProdutosRecomendados::all(),
            "produtosMaisAcessados" => VwProduto::orderByDesc("acessos")->take(25)->get(),
            "marcas" => Marca::all(),
            "departamentos" => Departamento::all(),
            "produtosVistoRecentemente" => $prodsRecentes,
        ]);
    }

    public function show(Produto $produto) {
        $produto->acessos = intval($produto->acessos) + 1;
        $produto->save();
        if(auth()) {
            $prodsRecentes = VwHistorico::where("user_id", auth()->id())
            ->take(25)
            ->get();
        }
        return view("show",[
            "produto" => VwProduto::find($produto->id),
            "produtosSimilares" => VwProduto::where("categoria_id", $produto->categoria_id)->get(),
            "produtosMaisAcessados" => VwProduto::orderByDesc("acessos")->take(25)->get(),
            "produtosVistoRecentemente" => $prodsRecentes,
            "reviews" => VwReview::where("produto_id", $produto->id)->get(),
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
            //apagar estes depois de fazer a pagina de busca//
            "marcas" => Marca::all(),
            "departamentos" => Departamento::all(),
            "produtosMaisAcessados" => VwProduto::orderByDesc("acessos")
                ->take(25)
                ->get(),
        ]);
    }
}
