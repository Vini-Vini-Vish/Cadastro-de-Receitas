<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cadastro as ModelsCadastro;


class cadastros extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run(ModelsCadastro $registro)
    {
        $registro->create([
            'nome' => 'Bruno',
            'email' => 'bruno@hotmail.com',
            'idade' => '10',
            'senha' => '123456789',
        ]);

        $registro->create([
            'nome' => 'vini',
            'email' => 'vini@hotmail.com',
            'idade' => '15',
            'senha' => '123456789',
        ]);

        $registro->create([
            'nome' => 'teste',
            'email' => 'teste@hotmail.com',
            'idade' => '11',
            'senha' => '123456789',
        ]);

        $registro->create([
            'nome' => 'perdidor',
            'email' => 'perdidor@hotmail.com',
            'idade' => '20',
            'senha' => '123456789',
        ]);

        $registro->create([
            'nome' => 'cost',
            'email' => 'cost@hotmail.com',
            'idade' => '35',
            'senha' => '123456789',
        ]);

        $registro->create([
            'nome' => 'asterol',
            'email' => 'asterol@hotmail.com',
            'idade' => '40',
            'senha' => '123456789',
        ]);
    }
}
