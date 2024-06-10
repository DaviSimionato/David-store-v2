<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Carrinho;
use App\Models\Categoria;
use App\Models\Departamento;
use App\Models\VwItensPedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function pedidos() {
        return view("pedidos", [
            "pedidos" => Pedido::query()->where("user_id", auth()->id())->get(),
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
    }

    public function pedido($numeroPedido) {
        $pedido = Pedido::query()->where("numero_pedido", $numeroPedido)
        ->where("user_id", auth()->id())->get();
        if($pedido->isEmpty()) {
            return redirect("/");
        }else {
            return view("detalhesPedido", [
                "pedido" => $pedido[0],
                "produtos" => VwItensPedido::query()->where("numero_pedido", $numeroPedido)
                ->get(),
                "metodoPag" => $pedido[0]->metodo_pagamento,
                "menuDepartamentos" => Departamento::all(),
                "menuCategorias" => Categoria::all(),
                "qtdCarrinho" => Carrinho::getQtd(),
            ]);
        }
    }
}
