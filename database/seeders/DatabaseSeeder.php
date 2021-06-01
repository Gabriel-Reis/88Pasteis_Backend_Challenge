<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CupomSeeder::class);
        $this->call(PagamentoSeeder::class);
        $this->call(StatusPedidoSeeder::class);
        $this->call(PastelSeeder::class);
        $this->call(BebidaSeeder::class); 
        $this->call(PastelPedidoSeeder::class); //TODO
        $this->call(BebidaPedidoSeeder::class); //TODO
        $this->call(PedidoSeeder::class); //TODO
    }
}
