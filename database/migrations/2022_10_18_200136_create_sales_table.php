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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->dateTime('sale_date');
            $table->decimal('tax');
            $table->decimal('total');
            $table->enum('status',['VALIDO', 'CANCELEDO'])->default('VALIDO'); //enum es para asiganarle 2 valores y por defecto una vez se  cree esara activo

            //llaves foraneas
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            //las imagenes no porque se creara un boleta a partir de los deltalles de esta venta

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
        Schema::dropIfExists('sales');
    }
};
