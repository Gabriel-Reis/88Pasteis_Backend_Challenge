<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastelPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastel_pedido', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('Quantidade');
            $table->timestamps();
            //KF
            $table->foreignId('pedido_id')->unsigned()->index();
            $table->foreignId('pastel_id')->unsigned()->index();
        });
        Schema::table('pastel_pedido', function ($table) {
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('pastel_id')->references('id')->on('pasteis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pastel_pedido');
    }
}
