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

    /**
     * Uma empresa possui um Diagnóstico de TI.
     */
    public function diagnostico()
    {
        return $this->hasOne(DiagnosticoTI::class);
    }

    /**
     * Uma empresa possui um Canvas.
     */
    public function canvas()
    {
        return $this->hasOne(Canvas::class);
    }
}
