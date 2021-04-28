<?php

namespace App\Models;

use GrahamCampbell\ResultType\Result;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Receitas extends Model
{
    protected $table = 'receitas';

    protected $fillable = 
    [
        'nome_receita', 
        'descricao', 
        'tempo_preparo', 
        'rendimento', 
        'lista_ingredientes', 
        'metodo_preparo',
    ];    

    //função de relacionamento com cadastro sendo (1 cadastro para muitas receitas)
    public function cadastro()
    {
        return $this->belongsTo('App\models\Cadastro','cadastro_id');
    }

    public function search($filter = null)
    {

         $results = $this->where(function ($query) use ($filter) {
           
           if($filter){
              $query->where('nome', 'LIKE', "%{$filter}%");
             }

        })->paginate();
         return $results;
    }
    
}
