<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canvas extends Model
{
    protected $table = 'canvases';

    protected $fillable = [
        'proposta_valor',
        'segmentos_clientes',
        'canais_distribuicao',
        'relacionamento_clientes',
        'fontes_receita',
        'recursos_chave',
        'atividades_chave',
        'parcerias_chave',
        'estrutura_custos',
        'empresa_id',
    ];

    protected $casts = [
        'proposta_valor' => 'array',
        'segmentos_clientes' => 'array',
        'canais_distribuicao' => 'array',
        'relacionamento_clientes' => 'array',
        'fontes_receita' => 'array',
        'recursos_chave' => 'array',
        'atividades_chave' => 'array',
        'parcerias_chave' => 'array',
        'estrutura_custos' => 'array',
    ];
}