<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticoTI extends Model
{
    use HasFactory;

    // Garante que o nome correto (diagnosticos_ti) seja usado
    protected $table = 'diagnosticos_ti';

    // O cast array faz tudo virar JSON automaticamente
    protected $casts = [
        'forcas' => 'array',
        'fraquezas' => 'array',
        'oportunidades' => 'array',
        'ameacas' => 'array',
        'recursos_ti' => 'array',
        'riscos' => 'array',
    ];

    protected $fillable = [
        'forcas', 'fraquezas', 'oportunidades', 'ameacas',
        'nivel_maturidade', 'recursos_ti', 'riscos'
    ];
}
