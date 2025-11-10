<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    // Define quais campos podem ser preenchidos pelo formulário
    protected $fillable = [
        'nome_empresa',
        'cnpj',
        'endereco',
        'cidade',
        'estado',
        'telefone',
        'email_contato',
        'missao',
        'visao',
        'valores',
    ];
}
