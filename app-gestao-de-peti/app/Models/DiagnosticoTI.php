<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticoTI extends Model
{
    use HasFactory;

    // Garante que o nome correto (diagnosticos_ti) seja usado
    protected $table = 'diagnosticos_ti';

    protected $fillable = [
        'forcas',
        'fraquezas',
        'oportunidades',
        'ameacas',
        'nivel_maturidade',
        'recursos_ti',
        'riscos',
    ];
}
