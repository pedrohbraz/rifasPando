<?php

use Illuminate\Database\Seeder;

class RifasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('rifas')->insert([
          'acao_id' => 1,
          'nome_rifa' => 'rifa 1',
          'id_comprador' => 1,
          

      ]);
    }
}
