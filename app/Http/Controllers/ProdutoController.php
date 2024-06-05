<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Review;
use App\Models\Produto;
use App\Models\Carrinho;
use App\Models\Favorito;
use App\Models\VwReview;
use App\Models\Categoria;
use App\Models\Historico;
use App\Models\VwProduto;
use App\Models\VwHistorico;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\VwProdutosRecomendados;

class ProdutoController extends Controller
{
    public function index() {
        if(!is_null(auth()->user())) {
            $prodsRecentes = VwHistorico::where("user_id", auth()->id())
            ->orderByDesc('historico_id')
            ->take(25)
            ->get();
        }
        return view("index", [
            "produtos" => VwProduto::all(),
            "produtosRecomendados" => VwProdutosRecomendados::all(),
            "produtosMaisAcessados" => VwProduto::orderByDesc("acessos")->take(25)->get(),
            "marcas" => Marca::all(),
            "departamentos" => Departamento::all(),
            "produtosVistoRecentemente" => $prodsRecentes ?? array(),
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
    }

    public function show(Produto $produto) {
        $produto->acessos = intval($produto->acessos) + 1;
        $produto->save();
        $fezReview = false;
        $favorito = false;
        if(!is_null(auth()->user())) {
            self::registrarHistorico(auth()->id(),$produto->id);
            $prodsRecentes = VwHistorico::where("user_id", auth()->id())
            ->orderByDesc('historico_id')
            ->take(25)
            ->get();

            $rev = Review::query()->where("user_id", auth()->id())
            ->where("produto_id", $produto->id)->get();
            if(!$rev->isEmpty()) {
                $fezReview = true;
            }

            $fav = Favorito::query()->where("user_id", auth()->id())
            ->where("produto_id", $produto->id)->get();
            if(!$fav->isEmpty()) {
                $favorito = true;
            }

        }
        return view("show",[
            "produto" => VwProduto::find($produto->id),
            "produtosSimilares" => VwProduto::where("categoria_id", $produto->categoria_id)->get(),
            "produtosMaisAcessados" => VwProduto::orderByDesc("acessos")->take(25)->get(),
            "produtosVistoRecentemente" => $prodsRecentes ?? array(),
            "reviews" => VwReview::where("produto_id", $produto->id)->take(5)->get(),
            "favorito" =>$favorito,
            "fezReview" => $fezReview,
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
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
        return view("busca", [
            "busca" => $busca,
            "produtos" => VwProduto::query()
                ->where("nome", "like", "%$busca%")
                ->orWhere("categoria", "like", "%$busca%")
                ->orWhere("departamento", "like", "%$busca%")
                ->orWhere("marca", "like", "%$busca%")
                ->paginate(12),
            "marcas" => Marca::all(),
            "departamentos" => Departamento::all(),
            "ordenador" => "Nada",
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
    }

    public function buscarOrdenado($busca,$ordenador) {
        $busca = str_replace("-", " ", $busca);
        switch($ordenador) {
            case "Menor-Preço":
                $order = ["precoAvistaVlr", "asc"];
                break;
            case "Maior-Preço":
                $order = ["precoAvistaVlr", "desc"];
                break;
            case "Acessos":
                $order = ["acessos", "desc"];
                break;
            default: 
                $order = ["id", "asc"];
                $ordenador = "Nada";
        }
        return view("busca", [
            "busca" => $busca,
            "produtos" => VwProduto::query()
                ->where("nome", "like", "%$busca%")
                ->orWhere("categoria", "like", "%$busca%")
                ->orWhere("departamento", "like", "%$busca%")
                ->orWhere("marca", "like", "%$busca%")
                ->orderBy($order[0], $order[1])
                ->paginate(12),
            "marcas" => Marca::all(),
            "departamentos" => Departamento::all(),
            "ordenador" => $ordenador,
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
    }

    public function registrarHistorico($u_id, $p_id) {
        $historico = Historico::where("user_id", $u_id)->where("produto_id",$p_id)->get();
        if($historico->isEmpty()) {
            Historico::create(["user_id" => $u_id,"produto_id" => $p_id]);
        }else {
            Historico::destroy($historico[0]->id);
            Historico::create(["user_id" => $u_id,"produto_id" => $p_id]);
        }
    }
}
