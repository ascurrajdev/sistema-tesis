<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialAgendamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_agendamientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agendamiento_id')->comment('Aqui asociamos con el agendamiento');
            $table->text('descripcion')->comment('Aqui vamos a describir lo que pasa en ese historial');
            $table->date('fecha_operacion')->comment('Aqui registro la fecha de operacion');
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
        Schema::dropIfExists('historial_agendamientos');
    }
}
