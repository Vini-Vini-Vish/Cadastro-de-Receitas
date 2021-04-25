<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(receitas::class);
        $this->call(sujestaos::class);
        $this->call(cadastros::class);
       // $this->call(cadastros::class);
        // \App\Models\User::factory(10)->create();
    }
}
