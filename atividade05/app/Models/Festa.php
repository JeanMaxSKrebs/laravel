<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'duracao',
        'num_convidados',
        'reserva_id',
    ];
    public function reserva()
{
    return $this->belongsTo(Reserva::class);
}

}
