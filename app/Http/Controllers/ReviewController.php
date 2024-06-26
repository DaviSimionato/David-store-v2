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

use function PHPUnit\Framework\isNull;

class ReviewController extends Controller
{
    public function mostrarReviews(Produto $produto) {
        return view("review.reviews",[
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
        return view("review.escreverReview", [
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
        return view("review.reviewsUsuario", [
            "reviews" => VwProdutosReview::query()
            ->where("user_id", auth()->id())
            ->orderBy('review_id', 'desc') 
            ->get(),
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
    }

    public function verUserReview($review) {
        $review = VwProdutosReview::query()
        ->where("review_id", $review)
        ->where("user_id", auth()->id())
        ->get();
        if($review->isEmpty()) {
            return redirect("/");
        }else {
            return view("review.review", [
                "review" => $review[0],
                "menuDepartamentos" => Departamento::all(),
                "menuCategorias" => Categoria::all(),
                "qtdCarrinho" => Carrinho::getQtd(),
            ]);
        }
    }

    public function editarReview($review) {
        $review = VwProdutosReview::query()
        ->where("review_id", $review)
        ->where("user_id", auth()->id())
        ->get();
        if($review->isEmpty()) {
            return redirect("/");
        }else {
            return view("review.editarReview", [
                "review" => $review[0],
                "menuDepartamentos" => Departamento::all(),
                "menuCategorias" => Categoria::all(),
                "qtdCarrinho" => Carrinho::getQtd(),
            ]);
        }
    }

    public function cadastrarReviewEdit(Review $review) {
        if($review->user_id != auth()->id()) {
            return redirect("/")->with("mensagem", "Usuário não é o dono da review!");
        }
        $nota = intval(request()->nota);
        $comentario = trim(request()->comentario);
        if($nota == intval($review->nota) && $comentario == trim($review->comentario)) {
            return redirect("/reviews/user")->with("mensagem", "Nenhuma alteração na review!");
        }
        if($nota > 5 || $nota < 0) {
            return redirect(url()->previous())->with("mensagem", "Nota com valor inválido!");
        }
        if(empty($comentario)) {
            $comentario = "Nenhum comentário";
        }
        $review->nota = $nota;
        $review->comentario = $comentario;
        $review->data_edit = date("d/m/Y");
        $review->save();
        return redirect("/reviews/user")->with("mensagem", "Review editada!");
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