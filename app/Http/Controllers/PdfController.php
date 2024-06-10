<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\VwItensPedido;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function gerarNota($numeroPedido) {
        $userCheck = Pedido::query()->where("numero_pedido", $numeroPedido)
        ->where("user_id", auth()->id())->get();
        if($userCheck->isEmpty()) {
            return redirect("/");
        }else {
            $pedido = Pedido::query()->where("numero_pedido", $numeroPedido)->get()[0];
            $itens = VwItensPedido::query()->where("numero_pedido", $numeroPedido)->get();
            $nota = Pdf::loadView("nota", [
                "pedido" => $pedido,
                "itens" => $itens
            ]);
            return $nota->setPaper("a4")->stream("Nota de compra.pdf");
        }
    }
}
