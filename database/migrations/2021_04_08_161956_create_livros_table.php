<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_livro', 100);
            $table->string('descricao', 150);
            $table->string('editora', 50);
            $table->integer('ano_publicacao');
            $table->string('autor', 50);   
            
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
        Schema::dropIfExists('livros');
    }
}
