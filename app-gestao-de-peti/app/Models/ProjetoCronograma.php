<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoCronograma extends Model
{
    use HasFactory;

    protected $table = 'projeto_cronograma';

    protected $fillable = [
        'projeto_id',
        'titulo',
        'data_inicio',
        'data_fim',
        'status',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim' => 'date',
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}