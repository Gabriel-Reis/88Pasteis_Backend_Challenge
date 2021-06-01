<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); //created_at, updated_at
            $table->softDeletesTz('deleted_at', 0);
            $table->unsignedDecimal('total', 5, 2);
            $table->string('cpf',11);
            $table->string('obs')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            //FK
            $table->foreignId('status_pedido_id')->unsigned()->index();
            $table->foreignId('user_id')->unsigned()->index();
            $table->foreignId('forma_pag_id')->unsigned()->index();
            $table->foreignId('cupom_id')->unsigned()->index();
        });
        
        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign('status_pedido_id')->references('id')->on('status_pedidos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('forma_pag_id')->references('id')->on('pagamentos');
            $table->foreign('cupom_id')->references('id')->on('cupons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
