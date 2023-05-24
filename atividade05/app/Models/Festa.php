<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festa extends Model
{
    use HasFactory;

    protected $table = 'festas';


    protected $fillable = [
        'nome',
        'duracao',
        'num_convidados',
        'contrato_id',
    ];
    public function reservas()
    {
        return $this->belongsTo(Reserva::class);
    }
    public function contratos()
    {
        return $this->belongsTo(Festa::class);
    }
}
