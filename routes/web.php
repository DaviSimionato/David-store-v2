<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [ProdutoController::class, "index"]);

Route::get("/produto/{produto}/{nome}", [ProdutoController::class, "show"])->where('nome', '.*');

Route::get("/busca", [ProdutoController::class, "handleBusca"]);

Route::get("/busca/{busca}", [ProdutoController::class, "buscar"]);

Route::get("/produtos/{busca}", [ProdutoController::class, "buscar"]);

Route::get("/produtos/{busca}/{ordenador}", [ProdutoController::class, "buscarOrdenado"]);

Route::get("/favoritar/{produto}/{nome}", [ProdutoController::class, "favoritarProduto"])->where('nome', '.*')->middleware("auth");

Route::get("/favoritos", [ProdutoController::class, "mostrarFavoritos"])->middleware("auth");

Route::get("/reviews/{produto}/{nome}", [ProdutoController::class, "mostrarReviews"])->where('nome', '.*');

Route::get("/escreverReview/{produto}/{nome}", [ProdutoController::class, "mostrarPagReview"])->where('nome', '.*')->middleware("auth");

Route::get("/login", [UserController::class, "login"])->middleware("guest")->name("login");

Route::get("/registrar", [UserController::class, "registrar"])->middleware("guest");

Route::get("/perfil", [UserController::class, "perfil"])->middleware("auth");

Route::get("/carrinho", [ProdutoController::class, "carrinho"])->middleware("auth");

Route::get("/pagamento", [ProdutoController::class, "pagamento"])->middleware("auth");

Route::get("/confirmarCompra/{metodo}", [ProdutoController::class, "confirmarCompra"])->middleware("auth");

Route::get("/addCarrinho/{produto}/{nome}", [ProdutoController::class, "addCarrinho"])->where('nome', '.*')->middleware("auth");

Route::get("/removerCarrinho/{produto}/{nome}", [ProdutoController::class, "removerCarrinho"])->where('nome', '.*')->middleware("auth");

Route::get("/comprar/{produto}/{nome}", [ProdutoController::class, "preCarrinho"])->where('nome', '.*')->middleware("auth");

Route::get("/sair", [UserController::class, "sair"])->middleware("auth");

Route::post("/cadastrarReview/{produto}", [ProdutoController::class, "cadastrarReview"])->middleware("auth");

Route::post("/entrar", [UserController::class, "entrar"])->middleware("guest");

Route::post("/cadastrar", [UserController::class, "cadastrar"])->middleware("guest");