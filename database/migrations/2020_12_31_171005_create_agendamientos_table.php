<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamientos', function (Blueprint $table) {
            $table->id();
            $table->date("start")->comment('Aqui iria la fecha inicial');
            $table->date("end")->comment('Aqui iria la fecha final, seria un rango siempre');
            $table->text("motivo")->comment("Aqui se especifica el motivo por el cual estan reservando el lugar");
            $table->integer('cantidad_personas')->comment('Aqui se especifica la cantidad de personas que irian');
            $table->string('numero_telefono')->comment('Aqui registramos el numero de telefono de la persona que hizo la reserva');
            $table->foreignId('servicio_id')->comment('Aqui se va a relacionar con el servicio');
            $table->foreignId('user_id')->comment('El usuario que reservo');
            $table->foreignId('estado_id')->comment('El estado del agendamiento');
            $table->date('fecha_maxima_confirmacion')->comment('Esta fecha seria el tope para realizar los pagos');
            $table->softDeletes();
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
        Schema::dropIfExists('agendamientos');
    }
}
