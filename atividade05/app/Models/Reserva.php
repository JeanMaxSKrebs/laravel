<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Reserva extends Pivot
{
    use HasFactory;

    protected $table = 'reservas';

    protected $fillable = [
        "data_hora",
        "valor",
        "salao_id",
        "cliente_id",
    ];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function salaos()
    {
        return $this->belongsTo(Salao::class);
    }

    public function pagamentos()
    {
        return $this->hasOne(Pagamento::class);
    }

}