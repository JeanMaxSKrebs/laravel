<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        "data_hora",
        "valor",
        "id_salao",
        "id_cliente",
    ];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function salao()
    {
        return $this->belongsTo(Salao::class);
    }

    public function pagamento()
    {
        return $this->hasOne(Pagamento::class);
    }

    public function festa()
    {
        return $this->hasOne(Festa::class);
    }

}