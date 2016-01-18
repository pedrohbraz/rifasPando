<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->string('email_paypal')->unique()->nullable();
          $table->string('telefone');
          $table->string('foto')->nullable();//esta null apenas para teste de seed, retirar depois
          $table->string('endereco')->nullable();//esta null apenas para teste de seed, retirar depois
          $table->string('login');
          $table->string('password', 60);
          $table->boolean('is_manager');
          $table->rememberToken();
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
      Schema::drop('users');
  }
}
