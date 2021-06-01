<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBebidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('bebidas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',40);
            $table->string('descricao');
            $table->unsignedDecimal('preco_unit', 4, 2);
            $table->boolean('disponivel');
            $table->softDeletesTz('deleted_at', 0);
            $table->timestamps();
            $table->string('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bebidas');
    }
}
