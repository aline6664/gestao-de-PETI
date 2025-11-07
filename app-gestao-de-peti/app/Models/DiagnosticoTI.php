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
        'empresa_id',
        'forcas',
        'fraquezas',
        'oportunidades',
        'ameacas',
        'nivel_maturidade',
        'recursos_ti',
        'riscos',
    ];

    /**
     * Um diagnóstico pertence a uma empresa.
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
