<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Receitas as ModelsReceitas;

class receitas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run(ModelsReceitas $registro)
    {
       
        $registro->create([
            'nome_receita' => 'pão com ovo',
            'descricao' => 'pão cortado com ovo frito',
            'tempo_preparo' => '10',
            'rendimento' => 'individual',
            'lista_ingredientes' => 'pão, ovo, tempero a gosto',
            'metodo_preparo' => 'quebre o ovo em uma vasilha separad, tempere se quiser,
                                 aqueça uma panela com oleo, assim que o oleo estiver quente,
                                 despeje o ovo, espere fritar, retire e ponha no pão cortado'
        ]);

        $registro->create([
            'nome_receita' => 'ovo cozido',
            'descricao' => 'ovo cozido sem erro',
            'tempo_preparo' => '15',
            'rendimento' => 'individual',
            'lista_ingredientes' => 'ovo, vinagre e água',
            'metodo_preparo' => 'em uma panela despeje agua, coloque o ovo a seguir estando ele totalmente submerso, adicione a vinagre a agua, tendo uma proporção de 10:2 de agua e vinagre'
        ]);
        
    }
}
