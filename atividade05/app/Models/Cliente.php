<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

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
        return $this->belongsToMany(Salao::class,'reservas','cliente_id','salao_id')->using(Reserva::class);
    }

}