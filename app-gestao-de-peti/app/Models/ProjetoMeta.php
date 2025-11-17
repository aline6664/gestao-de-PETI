<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoMeta extends Model
{
    use HasFactory;

    protected $table = 'projeto_metas';

    protected $fillable = [
        'projeto_id',
        'descricao',
        'criterio_sucesso',
        'status',
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}