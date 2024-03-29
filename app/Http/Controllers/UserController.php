<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function teste() {
        $data = [
        "nome" => "Davi",
        "sobrenome" => "Simionato",
        "telefone" => "(14) 99846-5258",
        "nome_usuario" => "Davi.s",
        "email" => "davi@gmail.com",
        "senha" => bcrypt("123456"),
        "pergunta_secreta" => "teste",
        "resposta_secreta" => bcrypt("teste123"),
        "cpf" => "12345678901",
        ];

        User::create($data);
        return redirect("/");
    }

    public function login() {
        return view("login");
    }

    public function entrar() {
        $dadosLogin = request()->validate([
            "email" => "required|email",
            "senha" => "required"
        ],[
            "email.email" => "Formato de email inválido",
            "email.required" => "Insira todos os dados",
            "senha.required" => "Insira todos os dados",
        ]);
        if(auth()->attempt($dadosLogin)) {
            request()->session()->regenerate();
            return redirect("/")->with("mensagem","Login realizado com sucesso!");
        }else {
            return back()->withErrors([
                "email" => "Dados inválidos",
                "senha" => "Dados inválidos"
            ]);
        }
    }

    public function registrar() {
        return view("registrar");
    }
}
