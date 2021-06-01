<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

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
            [
                'descricao' => 'Cartão de crédito - Visa',
                'foto' => '/images/pagamentos/visa.png'
            ],
            [
                'descricao' => 'Cartão de crédito - Mastercard',
                'foto' => '/images/pagamentos/master.png'
            ],
            [
                'descricao' => 'Dinheiro',
                'foto' => '/images/pagamentos/dinheiro.png'
            ],
            [
                'descricao' => 'Pix',
                'foto' => '/images/pagamentos/pix.png'
            ],
            [
                'descricao' => 'Pagamento por aproximação (NFC)',
                'foto' => '/images/pagamentos/nfc.png'
            ],
            [
                'descricao' => 'Pagamento por QRCode',
                'foto' => '/images/pagamentos/qrcode.png'
            ]
        ]);
    }
}