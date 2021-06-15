<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            [
                'user_id' => '1',
                'status_pedido_id' => '1',
                'obs' => null,
                'cpf' => '12345678901',
                'forma_pag_id' => '1',
                'cupom_id' => null,
                'total' => '52',
                'created_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-10),
                'updated_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-10),
            ],
            [
                'user_id' => '1',
                'status_pedido_id' => '2',
                'obs' => null,
                'cpf' => null,
                'forma_pag_id' => '4',
                'cupom_id' => '3',
                'total' => '37.05',
                'created_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-3),
                'updated_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-3),
            ],
        ]);
    }
}
