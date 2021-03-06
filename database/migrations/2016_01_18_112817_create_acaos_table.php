<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('acaos', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id');
        $table->integer('winner_id')->nullable()->unsigned();
        $table->foreign('winner_id')
              ->references('id')->on('users');

        $table->string('nome_acao',100);
        $table->longText('descricao');
        $table->string('numrifado')->nullable();
        $table->longText('imagem')->nullable();//esta null apenas para teste de seed, retirar depois
        $table->integer('quantidade_rifas');
        $table->integer('qtd_max');
        $table->decimal('valor_rifa',4,2);
        $table->date('data_sorteio')->nullable();//esta null apenas para teste de seed, retirar depois
        $table->string('forma_entrega')->nullable();//esta null apenas para teste de seed, retirar depois
        $table->string('nome_contato')->nullable();//esta null apenas para teste de seed, retirar depois
        $table->string('email')->nullable();//esta null apenas para teste de seed, retirar depois
        $table->longText('foto_contato')->nullable();//esta null apenas para teste de seed, retirar depois
        $table->string('telefone_contato')->nullable();//esta null apenas para teste de seed, retirar depois
        $table->softDeletes();
        $table->longText('deleted_reason')->nullable();
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
        Schema::drop('acaos');
    }
}
