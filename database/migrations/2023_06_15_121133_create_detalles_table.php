<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->id('iddetalles');
            $table->timestamps();
            $table->unsignedBigInteger('idpedido');
            $table->unsignedBigInteger('idproducto')->nullable();
            $table->integer('detallepedido');
            $table->string('anotaciones')->nullable();

            $table->foreign('idpedido')->references('idpedido')->on('pedido');
            $table->foreign('idproducto')->references('idproducto')->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles');
    }
};
