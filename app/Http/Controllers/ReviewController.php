<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Produto;
use App\Models\Carrinho;
use App\Models\VwReview;
use App\Models\Categoria;
use App\Models\VwProduto;
use App\Models\Departamento;
use App\Models\VwProdutosReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function mostrarReviews(Produto $produto) {
        return view("reviews",[
            "produto" => VwProduto::find($produto->id),
            "reviews" => VwReview::where("produto_id", $produto->id)->get(),
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
    }

    public function mostrarPagReview(Produto $produto) {
        if(!is_null(auth()->user())) {
            $rev = Review::query()->where("user_id", auth()->id())
            ->where("produto_id", $produto->id)->get();

            if(!$rev->isEmpty()) {
                $nome = str_replace(" ", "-", $produto->nome);
                return redirect("/produto/{$produto->id}/$nome")
                ->with("mensagem", "Você já avaliou este produto!");
            }
        }
        return view("escreverReview", [
            "produto" => VwProduto::find($produto->id),
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
    }

    public function cadastrarReview(Produto $produto) {
        $nome = str_replace(" ", "-", $produto->nome);
        $rev = Review::query()->where("user_id", auth()->id())
        ->where("produto_id", $produto->id)->get();
        if(!$rev->isEmpty()) {
            return redirect("/produto/{$produto->id}/$nome")
            ->with("mensagem", "Você já avaliou este produto!");
        }else {
            $nota = request()->validate([
                "nota" => "required|integer|between:0,5",
            ]);
            $comentario = request()->input("comentario");
            if(empty($comentario)) {
                $comentario = "Nenhum comentário";
            }
            $dataReview = date("d/m/Y");
            Review::create([
                "nota" => $nota["nota"],
                "user_id" => auth()->id(),
                "produto_id" => $produto->id,
                "comentario" => $comentario,
                "data_review" => $dataReview,
            ]);
            return redirect("/produto/{$produto->id}/$nome")
                ->with("mensagem", "Avaliação cadastrada!");
        }
    }

    public function userReviews() {
        return view("reviewsUsuario", [
            "reviews" => VwProdutosReview::query()
            ->where("user_id", auth()->id())
            ->orderBy('review_id', 'desc') 
            ->get(),
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
    }

    public function removerReview(Review $review) {
        if($review->user_id == auth()->id()) {
            $review->delete();
            return redirect("/reviews/user")->with("mensagem", "Review apagada!");
        }else {
            return redirect("/reviews/user")->with("mensagem", "Esta review não é sua!");
        }
    }
}
