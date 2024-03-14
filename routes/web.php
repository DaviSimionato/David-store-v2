<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProdutoController::class, "index"]);

Route::get('/busca', [ProdutoController::class, "handleBusca"]);

Route::get('/busca/{busca}', [ProdutoController::class, "buscar"]);

Route::get('/produtos/{busca}', [ProdutoController::class, "buscar"]);

Route::get('/login', [ProdutoController::class, "index"])->middleware("guest")->name("login");

Route::get('/perfil', [UserController::class, "perfil"])->middleware("auth");

Route::get('/favoritos', [UserController::class, "favoritos"])->middleware("auth");

Route::get('/carrinho', [UserController::class, "carrinho"])->middleware("auth");



// Route::get("/sla", [UserController::class, "teste"]);
