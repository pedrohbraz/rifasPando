<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagemADMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('mensagemADMs', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned()->index();
      $table->foreign('user_id')
             ->references('id')->on('users')
             ->onDelete('cascade');

      $table->string('titulo');
      $table->longText('descricao');
      $table->date('active_until')->nullable(); //esta null apenas para teste de seed, retirar depois
      $table->boolean('is_active')->default(true);
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
      Schema::drop('mensagemADMs');
  }
}
