<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente_id',
        'reserva_id',
        'valor_total',
        'data_pagamento',
        'data_vencimento',
    ];
    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

}