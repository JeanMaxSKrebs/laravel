<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $table = 'pagamentos';


    protected $fillable = [
        'tipo',
        'reserva_id',
        'data_vencimento',
        'data_pagamento',
        'valor_total',
        'valor_calcao',
        'desconto',
        'tipo_desconto',
    ];

    protected $casts = [
        'data_vencimento' => 'date',
        'data_pagamento' => 'date',
        'valor_total' => 'decimal:10,2',
        'valor_calcao' => 'decimal:10,2',
        'desconto' => 'int',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

    public function contratos()
    {
        return $this->hasOne(Contrato::class);
    }
}
