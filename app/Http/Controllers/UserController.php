<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function teste() {
        $data = [
        "nome" => "Davi",
        "sobrenome" => "Simionato",
        "telefone" => "(14) 99846-5258",
        "nome_usuario" => "Davi.s",
        "email" => "davi@gmail.com",
        "senha" => bcrypt("123"),
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
            "password" => "required"
        ],[
            "email.email" => "Formato de email inválido",
            "email.required" => "Insira todos os dados",
            "password.required" => "Insira todos os dados",
        ]);
        if(auth()->attempt($dadosLogin)) {
            request()->session()->regenerate();
            return redirect("/")->with("mensagem","Login realizado com sucesso!");
        }else {
            return back()->withErrors([
                "email" => "Dados inválidos",
                "password" => "Dados inválidos"
            ]);
        }
    }

    public function registrar() {
        return view("registrar");
    }

    public function sair() {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect("/")->with("menssagem", "User logged out");
    }
}
