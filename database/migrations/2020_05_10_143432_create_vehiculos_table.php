<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('idcliente')->unsigned ();
            $table->foreign('idcliente')->references('id')->on('clientes');
            $table->biginteger('idcupo')->unsigned ();
            $table->foreign('idcupo')->references('id')->on('cupos');
            $table->string('placa');
            $table->string('tipovehiculo');
            $table->string('horaentrada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
