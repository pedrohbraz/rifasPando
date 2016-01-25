<?php

use Illuminate\Database\Seeder;

class MensagemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('mensagems')->insert([
          'user_id' => 1,
          'acao_id' => 1,
          'mensagem' => 'testando mensagens',


      ]);
    }
}
