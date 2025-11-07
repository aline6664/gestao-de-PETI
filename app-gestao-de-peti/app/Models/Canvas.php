<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canvas extends Model
{
    use HasFactory;

    protected $table = 'canvases'; // Laravel pluraliza automaticamente “canvas” assim
                                   // Evita conflito com plural irregular do Laravel

    protected $fillable = [
        'empresa_id',
        'proposta_valor',
        'segmentos_clientes',
        'canais_distribuicao',
        'relacionamento_clientes',
        'fontes_receita',
        'recursos_chave',
        'atividades_chave',
        'parcerias_chave',
        'estrutura_custos',
    ];

    /**
     * Um Canvas pertence a uma empresa.
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
