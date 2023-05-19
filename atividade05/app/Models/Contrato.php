<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $fillable = [
        'descricao',
        'data_inicio',
        'data_fim',
        'valor_contrato',
        'pagamento_id',
    ];

    public function pagamento()
    {
        return $this->belongsTo(Pagamento::class);
    }

    public function festa()
    {
        return $this->belongsTo(Festa::class);
    }
}
