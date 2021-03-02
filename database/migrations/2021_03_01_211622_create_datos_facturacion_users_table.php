<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosFacturacionUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_facturacion_users', function (Blueprint $table) {
            $table->id();
            $table->string("cedula");
            $table->string("razon_social");
            $table->text("direccion");
            $table->string("ciudad");
            $table->string("telefono");
            $table->string("ruc");
            $table->foreignId("user_id");
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
        Schema::dropIfExists('datos_facturacion_users');
    }
}
