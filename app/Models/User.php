<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public $timestamps = false;
    
    protected $fillable = [
        "nome",
        "sobrenome",
        "telefone",
        "nome_usuario",
        "email",
        "senha",
        "pergunta_secreta",
        "resposta_secreta",
        "cpf",
    ];
    protected $hidden = [
        "senha",
        "resposta_secreta"
    ];
    protected $casts = [
        "senha" => "hashed",
        "resposta_secreat" => "hashed",
    ];
    
}
