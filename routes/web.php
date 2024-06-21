<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [ProdutoController::class, "index"]);

Route::get("/produto/{produto}/{nome}", [ProdutoController::class, "show"])->where('nome', '.*');

Route::get("/busca", [ProdutoController::class, "handleBusca"]);

Route::get("/busca/{busca}", [ProdutoController::class, "buscar"]);

Route::get("/produtos/{busca}", [ProdutoController::class, "buscar"]);

Route::get("/produtos/{busca}/{ordenador}", [ProdutoController::class, "buscarOrdenado"]);

Route::get("/favoritar/{produto}/{nome}", [FavoritoController::class, "favoritarProduto"])->where('nome', '.*')->middleware("auth");

Route::get("/favoritos", [FavoritoController::class, "mostrarFavoritos"])->middleware("auth");

Route::get("/reviews/{produto}/{nome}", [ReviewController::class, "mostrarReviews"])->where('nome', '.*');

Route::get("/reviews/user", [ReviewController::class, "userReviews"])->middleware("auth");

Route::get("/escreverReview/{produto}/{nome}", [ReviewController::class, "mostrarPagReview"])->where('nome', '.*')->middleware("auth");

Route::get("/verReview/{review}", [ReviewController::class, "verUserReview"])->middleware("auth");

Route::get("/editarReview/{review}", [ReviewController::class, "editarReview"])->middleware("auth");

Route::get("/removerReview/{review}", [ReviewController::class, "removerReview"])->middleware("auth");

Route::post("/cadastrarReview/{produto}", [ReviewController::class, "cadastrarReview"])->middleware("auth");

Route::post("/cadastrarReviewEdit/{review}", [ReviewController::class, "cadastrarReviewEdit"])->middleware("auth");

Route::get("/carrinho", [CarrinhoController::class, "carrinho"])->middleware("auth");

Route::get("/pagamento", [CarrinhoController::class, "pagamento"])->middleware("auth");

Route::get("/confirmarCompra/{metodo}", [CarrinhoController::class, "confirmarCompra"])->middleware("auth");

Route::get("/realizarPedido/{metodo}", [CarrinhoController::class, "realizarPedido"])->middleware("auth");

Route::get("/addCarrinho/{produto}/{nome}", [CarrinhoController::class, "addCarrinho"])->where('nome', '.*')->middleware("auth");

Route::get("/removerCarrinho/{produto}/{nome}", [CarrinhoController::class, "removerCarrinho"])->where('nome', '.*')->middleware("auth");

Route::get("/comprar/{produto}/{nome}", [CarrinhoController::class, "preCarrinho"])->where('nome', '.*')->middleware("auth");

Route::get("/pedidoConfirmado/{numeroPedido}", [CarrinhoController::class, "pedidoConfirmado"])->middleware("auth");

Route::get("/nota/{numeroPedido}", [PdfController::class, "gerarNota"])->middleware("auth");

Route::get("/pedidos", [PedidoController::class, "pedidos"])->middleware("auth");

Route::get("/pedido/{numeroPedido}", [PedidoController::class, "pedido"])->middleware("auth");

Route::get("/login", [UserController::class, "login"])->middleware("guest")->name("login");

Route::get("/registrar", [UserController::class, "registrar"])->middleware("guest");

Route::get("/perfil", [UserController::class, "perfil"])->middleware("auth");

Route::get("/config/conta", [UserController::class, "configConta"])->middleware("auth");

Route::get("/sair", [UserController::class, "sair"])->middleware("auth");

Route::post("/entrar", [UserController::class, "entrar"])->middleware("guest");

Route::post("/cadastrar", [UserController::class, "cadastrar"])->middleware("guest");