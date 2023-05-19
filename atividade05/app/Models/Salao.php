<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Salao extends Model
{
    use HasFactory;
    protected $table = 'saloes';

    protected $fillable = [
        'nome',
        'descricao',
        'capacidade',
        'cidade',
        'endereco',
        'cnpj',
        'logo',
        'imagens',
        'mensagens'
    ];
    
    // public function reservas()
    // {
    //     return $this->hasMany(Reserva::class);
    // }

    public function clientes(): BelongsToMany
    {
        return $this->belongsToMany(Cliente::class)->using(Reserva::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

}
