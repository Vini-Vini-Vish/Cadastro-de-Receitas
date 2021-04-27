<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstiloVidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estilo_vidas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 60);
            $table->string('descricao', 250);    
            
            //chave estrangeira de cadastros 
            $table->Integer ('cadastro_id')->unsigned();
            $table->foreign ('cadastro_id')->references('id')->on('cadastros')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estilo_vidas');
    }
}
