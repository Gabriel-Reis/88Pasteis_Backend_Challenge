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
            [
                'descricao' => 'Aguardando confirmação'
            ],
            [
                'descricao' => 'Em produção'
            ],
            [
                'descricao' => 'Em rota de entrega'
            ],
            [
                'descricao' => 'Entregue'
            ],
            [
                'descricao' => 'Finalizado'
            ]
        ]);
    }
}