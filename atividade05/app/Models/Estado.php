<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = ['nome','uf','codigouf','regiao_id'];

    public function regiao(){
        return $this->belongsTo(Regiao::class);
    }

    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regiao_id')
                ->references('id')->on('regioes')
                ->cascadeOnDelete();
            $table->integer('codigouf');
            $table->string('nome', 50);
            $table->char('uf', 2);
            $table->timestamps();
        });
    }
}