<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;
use App\File;


class PagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagamentos')->insert([
            'descricao' => 'Cartão de crédito - Visa',
            'foto' => storage_path('app\images\pagamentos\visa.png'),
        ]);
        DB::table('pagamentos')->insert([
            'descricao' => 'Cartão de crédito - Mastercard',
            'foto' => storage_path('app\images\pagamentos\master.png'),
        ]);
        DB::table('pagamentos')->insert([
            'descricao' => 'Dinheiro',
            'foto' => storage_path('app\images\pagamentos\dinheiro.png'),
        ]);
        DB::table('pagamentos')->insert([
            'descricao' => 'Pix',
            'foto' => storage_path('app\images\pagamentos\pix.png'),
        ]);
        DB::table('pagamentos')->insert([
            'descricao' => 'Pagamento por aproximação (NFC)',
            'foto' => storage_path('app\images\pagamentos\nfc.png'),
        ]);
        DB::table('pagamentos')->insert([
            'descricao' => 'Pagamento por QRCode',
            'foto' => storage_path('app\images\pagamentos\qrcode.png'),
        ]);
    }
}