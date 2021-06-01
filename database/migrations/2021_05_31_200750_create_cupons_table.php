<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();
            $table->string('code',20);
            $table->string('descricao');
            $table->timestamp('date_ini');
            $table->timestamp('date_end');
            $table->unsignedDecimal('desconto', 5, 2);
            $table->timestamps();
            $table->softDeletesTz('deleted_at', 0);
            $table->foreignId('created_by')->unsigned()->index();;
            $table->unsignedInteger('deleted_by')->nullable();
        });
        Schema::table('cupons', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cupons');
    }
}
