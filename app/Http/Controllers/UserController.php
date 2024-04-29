<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
            return redirect("/")->with("mensagem","Usuário conectado!");
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

    public function cadastrar() {
        $dadosCadastro = request()->validate([
            "nome" => "required|string|max:255",
            "sobrenome" => "required|string|max:255",
            "nome_usuario" => "required|string|unique:users,nome_usuario|max:255",
            "email" => "required|string|email|unique:users,email|max:255",
            "telefone" => "required|string|min:10|max:16", 
            "cpf" => "required|string|size:14|unique:users,cpf",
            "password" => "required|string|min:3|confirmed",
            "password_confirmation" => "required|string|min:3",
            "pergunta_secreta" => "required|string|max:255",
            "resposta_secreta" => "required|string|max:255",
        ],[
            "required" => "O campo :attribute é obrigatório.",
            "string" => "O campo :attribute deve ser um texto.",
            "max" => "O campo :attribute deve ter no máximo :max caracteres.",
            "unique" => "O valor informado em :attribute já está em uso.",
            "email" => "O :attribute deve ser um endereço de e-mail válido.",
            "min" => "O campo :attribute deve ter no mínimo :min caracteres.",
            "confirmed" => "A confirmação da senha não confere.",
            "size" => "O campo :attribute deve ter exatamente :size caracteres.",
            "password.required" => "O campo senha é obrigatório.",
            "password.min" => "A senha deve ter no mínimo :min caracteres.",
            "password.confirmed" => "A confirmação da senha não confere.",
            "password_confirmation.required" => "O campo de confirmação é obrigatório.",
        ]);

        $dadosCadastro["password"] = bcrypt($dadosCadastro["password"]);
        $user = User::create($dadosCadastro);
        auth()->login($user);
        return redirect("/")->with("mensagem", "Usuário criado!");
    }

    public function sair() {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect("/")->with("mensagem", "Usuário desconectado!");
    }
}
