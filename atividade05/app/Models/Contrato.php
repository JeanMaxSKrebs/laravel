<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';

    protected $fillable = [
        'descricao',
        'data_inicio',
        'data_fim',
        'valor_contrato',
        'pagamento_id',
    ];

    public function pagamentos()
    {
        return $this->belongsTo(Pagamento::class);
    }

    public function festas()
    {
        return $this->belongsTo(Festa::class);
    }
}
