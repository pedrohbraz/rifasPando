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
        $table->integer('id_user')->unsigned()->index();;
        $table->foreign('id_user')
               ->references('id')->on('users')
               ->onDelete('cascade');

        $table->integer('id_acao')->unsigned()->index();;
        $table->foreign('id_acao')
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
