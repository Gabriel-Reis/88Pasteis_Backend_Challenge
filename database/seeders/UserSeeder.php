<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => '88pasteis@gmail.com',
            'password' => bcrypt('12345678'),
            'telefone' => '1128772700',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'endereco' => 'R. Min. Jesuíno Cardoso, 531',
            'complemento' => '',
            'bairro' => 'Vila Nova',
            'cep' => '04544051',
            'cpf' => '12345678911',
            'cidade' => 'São Paulo',
            'estado' => 'SP',
            'data_nasc' => '2016-01-01',
            'tipo' => '2',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
