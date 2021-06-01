<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class StatusPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('status_pedidos')->insert([
            'descricao' => 'Aguardando confirmação'
        ]);
        DB::table('status_pedidos')->insert([
            'descricao' => 'Em produção'
        ]);
        DB::table('status_pedidos')->insert([
            'descricao' => 'Em rota de entrega'
        ]);
        DB::table('status_pedidos')->insert([
            'descricao' => 'Entregue'
        ]);
        DB::table('status_pedidos')->insert([
            'descricao' => 'Finalizado'
        ]);
    }
}