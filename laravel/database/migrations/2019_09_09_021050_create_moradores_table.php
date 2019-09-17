<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moradores', function (Blueprint $table) { //Criando Migration moradores
            $table->bigIncrements('id');
            $table->integer('cpf');
            $table->string('nome');
            $table->string('email');
            $table->integer('telefone');
            $table->string('placa');
            $table->string('veiculo');
            $table->string('situacao');

            $table->bigInteger('condominio_id')->unsigned();
            $table->foreign('condominio_id')->references('id')->on('condominios')->onDelete('cascade');

            $table->bigInteger('unidade_id')->unsigned();
            $table->foreign('unidade_id')->references('id')->on('unidades')->onDelete('cascade');


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
        Schema::dropIfExists('moradors');
    }
}
