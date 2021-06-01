<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class PastelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pasteis')->insert([
        	[
            	'titulo' => 'Pastel de queijo',
            	'descricao' => 'Pastel com recheio de mussarela',
            	'foto' => '/images/pasteis/queijo.jpg',
            	'salgado' => '1',
            	'preco_unit' => '8',
            	'disponivel' => '1',
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
            	'titulo' => 'Pastel de calabresa',
            	'descricao' => 'Pastel com recheio de calabresa com catupiry',
            	'foto' => '/images/pasteis/calabresa.jpg',
            	'salgado' => '1',
            	'preco_unit' => '7',
            	'disponivel' => '1',
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
            	'titulo' => 'Pastel de calabresa com cheddar',
            	'descricao' => 'Pastel com recheio de calabresa com cheddar',
            	'foto' => '/images/pasteis/calabresa_cheddar.jpg',
            	'salgado' => '1',
            	'preco_unit' => '7.5',
            	'disponivel' => '1',
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
            	'titulo' => 'Pastel de carne',
            	'descricao' => 'Pastel com recheio de carne',
            	'foto' => '/images/pasteis/carne.jpg',
            	'salgado' => '1',
            	'preco_unit' => '7',
            	'disponivel' => '1',
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
            	'titulo' => 'Pastel de carne seca',
            	'descricao' => 'Pastel com recheio de carne seca com mussarela',
            	'foto' => '/images/pasteis/carne_seca.jpg',
            	'salgado' => '1',
            	'preco_unit' => '9',
            	'disponivel' => '1',
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
            	'titulo' => 'Pastel de frango',
            	'descricao' => 'Pastel com recheio de frango com catupiry',
            	'foto' => '/images/pasteis/frango.jpg',
            	'salgado' => '1',
            	'preco_unit' => '7',
            	'disponivel' => '1',
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
            	'titulo' => 'Pastel de palmito',
            	'descricao' => 'Pastel com recheio de palmito com mussarela',
            	'foto' => '/images/pasteis/palmito.jpg',
            	'salgado' => '1',
            	'preco_unit' => '9',
            	'disponivel' => '1',
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
            	'titulo' => 'Pastel de nutella',
            	'descricao' => 'Pastel com recheio de nutella',
            	'foto' => '/images/pasteis/nutella.jpg',
            	'salgado' => '0',
            	'preco_unit' => '10',
            	'disponivel' => '1',
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]
        ]);
    }
}
