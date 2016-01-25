<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('mensagems', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned()->index();;
        $table->foreign('user_id')
               ->references('id')->on('users')
               ->onDelete('cascade');

        $table->integer('acao_id')->unsigned()->index();;
        $table->foreign('acao_id')
               ->references('id')->on('acaos')
               ->onDelete('cascade');

        $table->longText('mensagem');
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
        Schema::drop('mensagems');
    }
}
