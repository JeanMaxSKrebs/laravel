<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'cpf',
        'idade',
        'email',
        'telefone',
        'mensagens',
        'foto_perfil',
    ];    
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
    public function saloes(): BelongsToMany
    {
        return $this->belongsToMany(Salao::class,'reservas','id_cliente','id_salao')->using(Reserva::class);
    }

}