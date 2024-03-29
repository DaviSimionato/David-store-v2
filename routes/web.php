<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdutoController::class, "index"]);

Route::get('/produto/{produto}/{nome}', [ProdutoController::class, "show"]);

Route::get('/busca', [ProdutoController::class, "handleBusca"]);

Route::get('/busca/{busca}', [ProdutoController::class, "buscar"]);

Route::get('/produtos/{busca}', [ProdutoController::class, "buscar"]);

Route::get('/login', [UserController::class, "login"])->middleware("guest")->name("login");

Route::get('/registrar', [UserController::class, "registrar"])->middleware("guest");

Route::get('/perfil', [UserController::class, "perfil"])->middleware("auth");

Route::get('/favoritos', [UserController::class, "favoritos"])->middleware("auth");

Route::get('/carrinho', [UserController::class, "carrinho"])->middleware("auth");

// Route::get("/sla", [UserController::class, "teste"]);