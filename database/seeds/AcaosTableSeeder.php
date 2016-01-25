<?php

use Illuminate\Database\Seeder;

class AcaosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('acaos')->insert([
          'user_id' => 1,
          'nome_acao' => 'rifa 1',
          'descricao' => 'teste rifa',
          'quantidade_rifas'=>20,
          'valor_rifa'=>12.5,
          

      ]);
    }
}
