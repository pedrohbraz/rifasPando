<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('rifas', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('acao_id')->unsigned()->index();
      $table->foreign('acao_id')
             ->references('id')->on('acaos')
             ->onDelete('cascade');

      $table->string('nome_rifa');
      $table->integer('user_id')->nullable()->unsigned()->index();//comprador
      $table->foreign('user_id')
             ->references('id')->on('users')
             ->onDelete('cascade');

      $table->date('soldAt')->nullable();//apenas para teste esta null
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::drop('rifas');
  }
}
