<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Carrinho;
use App\Models\Categoria;
use App\Models\VwHistorico;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function login() {
        return view("login", [
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
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

    public function recuperarSenha() {
        return view("recuperarSenha", [
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
    }

    public function mudarSenha() {
        $dados = request()->validate([
            "email" => "required|string|email",
            "novaSenha" => "required|string|min:3|confirmed",
            "novaSenha_confirmation" => "required|string|min:3",
            "respostaSecreta" => "required",
        ],[
            "required" => "O campo :attribute é obrigatório.",
            "string" => "O campo :attribute deve ser um texto.",
            "min" => "O campo :attribute deve ter no mínimo :min caracteres.",
            "confirmed" => "A confirmação da senha não confere.",
        ]);
        $user = User::query()->where("email", $dados["email"])->get()->first();
        if(!isset($user)) {
            return redirect("/recuperarSenha")->with("mensagem","Dados fornecidos não conferem!");
        }
        $respostaCorreta = password_verify(request()->respostaSecreta, $user["resposta_secreta"]);
        if($respostaCorreta) {
            return redirect("/login")->with("mensagem","Dados alterados!");
        }else {
            return redirect("/recuperarSenha")->with("mensagem","Dados fornecidos não conferem!");
        }
    }

    public function perfil() {
        $prodsRecentes = VwHistorico::where("user_id", auth()->id())
        ->orderByDesc('historico_id')
        ->take(25)
        ->get();
        return view("perfil", [
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
            "produtosVistoRecentemente" => $prodsRecentes ?? array(),
        ]);
    }

    public function configConta() {
        return view("configConta", [
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
    }

    public function alterarDados() {
        request()->validate([
            "nome" => "required|string|max:255",
            "sobrenome" => "required|string|max:255",
            "nome_usuario" => "required|string|unique:users,nome_usuario," . auth()->id() . "|max:255",
            "email" => "required|string|email|unique:users,email," . auth()->id() . "|max:255",
            "telefone" => "required|string|min:10|max:16", 
            "cpf" => "required|string|size:14|unique:users,cpf," . auth()->id(),
        ]);
        $user = User::query()->where("id", auth()->id())->get()->first();
        $user["nome"] = request()->nome;
        $user["sobrenome"] = request()->sobrenome;
        $user["nome_usuario"] = request()->nome_usuario;
        $user["email"] = request()->email;
        $user["cpf"] = request()->cpf;
        $user->save();
        return redirect("/perfil")->with("mensagem","Dados alterados com sucesso!");
    }

    public function registrar() {
        return view("registrar", [
            "menuDepartamentos" => Departamento::all(),
            "menuCategorias" => Categoria::all(),
            "qtdCarrinho" => Carrinho::getQtd(),
        ]);
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
