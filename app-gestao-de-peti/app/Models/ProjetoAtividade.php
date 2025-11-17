<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoAtividade extends Model
{
    use HasFactory;

    protected $table = 'projeto_atividades';

    protected $fillable = [
        'projeto_id',
        'titulo',
        'descricao',
        'status',
        'responsavel',
        'data_inicio',
        'data_fim_prevista',
        'data_fim_real',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim_prevista' => 'date',
        'data_fim_real' => 'date',
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }

    public function isAtrasada()
    {
        return $this->data_fim_prevista &&
               now()->greaterThan($this->data_fim_prevista) &&
               $this->status !== 'concluida';
    }
}