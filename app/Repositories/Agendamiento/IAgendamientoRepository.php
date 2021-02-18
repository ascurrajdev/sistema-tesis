<?php
namespace App\Repositories\Agendamiento;

interface IAgendamientoRepository{
    public function getAllAgendamientoCount();
    public function getAllAgendamientosWithHistorial();
}