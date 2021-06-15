<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;


class PastelPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pastel_pedido')->insert([
            [
                'quantidade' => '2',
                'pedido_id' => '1',
                'pastel_id' => '3',
                'created_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-10),
                'updated_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-10),
            ],
            [
                'quantidade' => '1',
                'pedido_id' => '1',
                'pastel_id' => '4',
                'created_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-10),
                'updated_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-10),
            ],
            [
                'quantidade' => '1',
                'pedido_id' => '1',
                'pastel_id' => '6',
                'created_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-10),
                'updated_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-10),
            ],
            [
                'quantidade' => '2',
                'pedido_id' => '1',
                'pastel_id' => '7',
                'created_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-10),
                'updated_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-10),
            ],
            [
                'quantidade' => '1',
                'pedido_id' => '2',
                'pastel_id' => '6',
                'created_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-3),
                'updated_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-3),
            ],
            [
                'quantidade' => '3',
                'pedido_id' => '2',
                'pastel_id' => '7',
                'created_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-3),
                'updated_at' => Carbon::createFromDate(date("Y"), date("m"), date("d")-3),
            ],
        ]);
    }
}
