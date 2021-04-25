<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sujestao as ModelsSujestao;

class sujestaos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(ModelsSujestao $registro)
    {
        $registro->create([
            'nome_receita' => 'pão com ovo',
            'descricao' => 'pão cortado com ovo frito',
        ]);
    }
}
