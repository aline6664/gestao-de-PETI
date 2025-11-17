<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoIndicador extends Model
{
    use HasFactory;

    protected $table = 'projeto_indicadores';

    protected $fillable = [
        'projeto_id',
        'nome',
        'valor_atual',
        'valor_meta',
        'unidade',
    ];

    protected $casts = [
        'valor_atual' => 'decimal:2',
        'valor_meta' => 'decimal:2',
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}