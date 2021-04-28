<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $table = 'cadastros';

    protected $fillable = 
    [
        'nome', 
        'email', 
        'idade', 
        'senha',         
    ];  

    //função de relacionamento com receitas sendo (1 cadastro para muitas receitas)
    public function receitas()
    {
        return $this->hasMany('App\models\Receitas', 'cadastro_id')
    }
}
