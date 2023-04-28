<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
    public function reservas()
{
    return $this->hasMany(Reserva::class);
}

}
