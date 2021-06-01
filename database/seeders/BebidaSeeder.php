<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class BebidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('bebidas')->insert([
        	[
            	'titulo' => 'Água 500ml',
            	'descricao' => 'Garrafa de água Crystal 500ml',
            	'foto' => '/images/bebidas/agua_500.jpg',
            	'preco_unit' => '8',
            	'disponivel' => '1',
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
            	'titulo' => 'Coca-Cola lata',
            	'descricao' => 'Refrigerante Coca-Cola lata',
            	'foto' => '/images/bebidas/coca_lata.jpg',
            	'preco_unit' => '7',
            	'disponivel' => '1',
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
            	'titulo' => 'Coca-Cola 600ml',
            	'descricao' => 'Garrafa de refrigerante Coca-Cola 600ml',
            	'foto' => '/images/bebidas/coca_600.jpg',
            	'preco_unit' => '7',
            	'disponivel' => '1',
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
            	'titulo' => 'Fanta Laranja lata',
            	'descricao' => 'Refrigerante Fanta Laranja lata',
            	'foto' => '/images/bebidas/fanta_lata.jpg',
            	'preco_unit' => '7',
            	'disponivel' => '1',
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
            	'titulo' => 'Fanta Laranja 600ml',
            	'descricao' => 'Garrafa de refrigerante Fanta Laranja 600ml',
            	'foto' => '/images/bebidas/fanta_600.jpg',
            	'preco_unit' => '7',
            	'disponivel' => '1',
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]
        ]);
    }
}
