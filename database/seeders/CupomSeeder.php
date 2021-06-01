<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class CupomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cupons')->insert([
            'code' => '10OFF',
            'descricao' => '10 reais off para seus pedidos',
            'desconto' => '10',
            'date_ini' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'date_end' => Carbon::createFromDate(date("Y")+1, date("m"), date("d")),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => '1',
        ]);

        DB::table('cupons')->insert([
            'code' => '15OFF',
            'descricao' => '15 reais off para seus pedidos',
            'desconto' => '15',
            'date_ini' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'date_end' => Carbon::createFromDate(date("Y"), date("m"), date("d")+10),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => '1',
        ]);
    }
}
