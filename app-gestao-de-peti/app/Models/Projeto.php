<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $table = 'projetos';

    protected $fillable = [
        'nome',
        'descricao',
        'status',
        'data_inicio',
        'data_fim_prevista',
        'data_fim_real',
        'percentual_concluido',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim_prevista' => 'date',
        'data_fim_real' => 'date',
    ];

    /* -----------------------------------------
    | RELACIONAMENTOS
    |------------------------------------------*/

    public function atividades()
    {
        return $this->hasMany(ProjetoAtividade::class);
    }

    public function metas()
    {
        return $this->hasMany(ProjetoMeta::class);
    }

    public function indicadores()
    {
        return $this->hasMany(ProjetoIndicador::class);
    }

    public function cronograma()
    {
        return $this->hasMany(ProjetoCronograma::class);
    }

    /* -----------------------------------------
    | MÉTODOS AUXILIARES
    |------------------------------------------*/

    public function isAtrasado()
    {
        return $this->data_fim_prevista &&
               now()->greaterThan($this->data_fim_prevista) &&
               $this->status !== 'concluido';
    }

    public function progressoAutomatico()
    {
        $total = $this->atividades()->count();
        $concluidas = $this->atividades()->where('status', 'concluida')->count();

        if ($total === 0) return 0;

        return floor(($concluidas / $total) * 100);
    }
}