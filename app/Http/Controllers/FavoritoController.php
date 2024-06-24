<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Carrinho;
use App\Models\Favorito;
use App\Models\Categoria;
use App\Models\VwFavorito;
use App\Models\Departamento;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    public function favoritarProduto(Produto $produto) {
        $nome = str_replace(" ", "-", $produto->nome);
        $fav = Favorito::query()->where("user_id", auth()->id())
        ->where("produto_id", $produto->id)->get();
        if($fav->isEmpty()) {
            Favorito::create([
                "user_id" => auth()->id(),
                "produto_id" => $produto->id
            ]);
            $mensagem = "Produto adicionado aos favoritos!";
        }else {
            $fav[0]->delete();
            $mensagem = "Produto removido dos favoritos!";
        }
        return redirect("/produto/{$produto->id}/$nome")
        ->with("mensagem", $mensagem);
    }

    public function mostrarFavoritos() {
        return view("favoritos", [
            "produtos" => VwFavorito::query()
            ->where("user_id", auth()->id())->get(),
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
    }
}