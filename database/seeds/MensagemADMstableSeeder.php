<?php

use Illuminate\Database\Seeder;

class MensagemADMstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('mensagemADMs')->insert([
          'user_id' => 1,
          'titulo' => 'Mensagem adm',
          'descricao'=>'ola mundo',
          
      ]);
    }
}
