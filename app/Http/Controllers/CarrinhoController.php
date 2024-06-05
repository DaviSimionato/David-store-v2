<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Carrinho;
use App\Models\Categoria;
use App\Models\VwProduto;
use App\Models\VwCarrinho;
use App\Models\Itenspedido;
use App\Models\Departamento;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinho() {
        return view("carrinho",[
            "produtos" => VwCarrinho::query()->where("user_id", auth()->id())->get(),
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
    }

    public function addCarrinho(Produto $produto) {
        $nome = str_replace(" ", "-", $produto->nome);
        $carrinhoCheck = Carrinho::query()->where("user_id", auth()->id())
        ->where("produto_id", $produto->id)->get();
        if($carrinhoCheck->isEmpty()) {
            Carrinho::create([
                "user_id" => auth()->id(),
                "produto_id" => $produto->id
            ]);
            $mensagem = "Produto adicionado ao carrinho!";
        }else {
            $mensagem = "Produto já presente no carrinho!";
        }
        return redirect("/produto/{$produto->id}/$nome")
        ->with("mensagem", $mensagem);
    }

    public function removerCarrinho(Produto $produto) {
        $produtoCarrinho = Carrinho::query()->where("user_id", auth()->id())
        ->where("produto_id", $produto->id)->get();
        if(!$produtoCarrinho->isEmpty()) {
            $produtoCarrinho[0]->delete();
        }
        return redirect("/carrinho")->with("mensagem", "Produto removido do carrinho!");
    }

    public function preCarrinho(VwProduto $produto) {
        $carrinhoCheck = Carrinho::query()->where("user_id", auth()->id())
        ->where("produto_id", $produto->id)->get();
        if($carrinhoCheck->isEmpty()) {
            Carrinho::create([
                "user_id" => auth()->id(),
                "produto_id" => $produto->id
            ]);
            $mensagem = "Produto adicionado ao carrinho";
        }else {
            $mensagem = "Produto já presente no carrinho";
        }
        return view("preCarrinho",[
            "produto" => $produto,
            "mensagem" => $mensagem,
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]); 
    }

    public function pagamento() {
        $carrinhoCheck = Carrinho::query()->where("user_id", auth()->id())
        ->get();
        if($carrinhoCheck->isEmpty()) {
            return redirect("/");
        }else {
            return view("pagamento",[
                "produtos" => VwCarrinho::query()->where("user_id", auth()->id())->get(),
                "menuDepartamentos" => Departamento::all(),
                "menuCategorias" => Categoria::all(),
                "qtdCarrinho" => Carrinho::getQtd(),
            ]); 
        }
    }

    public function confirmarCompra($metodo) {
        if($metodo != "Pix" && $metodo != "Cartao") {
            return redirect("/pagamento")->with("mensagem", "Selecione um método de pagamento!");
        }else {
            $carrinhoCheck = Carrinho::query()->where("user_id", auth()->id())
            ->get();
            if($carrinhoCheck->isEmpty()) {
                return redirect("/")->with("mensagem", "Seu carrinho está vazio!");
            }else {
                return view("confirmarCompra",[
                    "produtos" => VwCarrinho::query()->where("user_id", auth()->id())
                    ->get(),
                    "metodoPag" => $metodo,
                    "menuDepartamentos" => Departamento::all(),
                    "menuCategorias" => Categoria::all(),
                    "qtdCarrinho" => Carrinho::getQtd(),
                ]);
            } 
        }
    }

    public function realizarPedido($metodo) {
        if($metodo != "Pix" && $metodo != "Cartao") {
            return redirect("/pagamento")->with("mensagem", "Selecione um método de pagamento!");
        }else {
            $carrinho = VwCarrinho::query()->where("user_id", auth()->id())
            ->get();
            $frete = $carrinho->count("id") * 12.3;
            if($metodo == "Pix") {
                $valorCompra = ($carrinho->sum("precoOriginal") * 0.9) + $frete;
            }else {
                $valorCompra = $carrinho->sum("precoOriginal") + $frete;
                $metodo = "Cartão de crédito";
            }
            $valorCompra = "R$" . number_format($valorCompra,2,",",".");
            $dataPedido = date("d/m/Y");
            $numeroPedido = intval(floor(mt_rand(1000000,9999999)));
            while(!Pedido::query()->where("numero_pedido",$numeroPedido)->get()->isEmpty()) {
                $numeroPedido = intval(floor(mt_rand(1000000,9999999)));
            }
            Pedido::create([
                "numero_pedido" => $numeroPedido,
                "total_pedido" => $valorCompra,
                "data_pedido" => $dataPedido,
                "user_id" => auth()->id(),
                "metodo_pagamento" => $metodo
            ]);
            foreach($carrinho as $item) {
                Itenspedido::create([
                    "produto_id" => $item->id,
                    "numero_pedido" => $numeroPedido
                ]);
            }
            Carrinho::query()->where("user_id", auth()->id())->delete();
            return view("pedidoConfirmado",[
                "metodoPag" => $metodo,
                "numeroPedido" => $numeroPedido,
                "menuDepartamentos" => Departamento::all(),
                "menuCategorias" => Categoria::all(),
                "qtdCarrinho" => Carrinho::getQtd(),
            ]);
        }
    }
}
