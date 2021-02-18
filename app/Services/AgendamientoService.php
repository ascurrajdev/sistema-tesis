<?php
namespace App\Services;

use App\Repositories\Agendamiento\IAgendamientoRepository;
class AgendamientoService{

    private $iAgendamientoRepository;

    public function __construct(){
        $this->iAgendamientoRepository = resolve(IAgendamientoRepository::class);
    }

    public function getCount(){
        return $this->iAgendamientoRepository->getAllAgendamientoCount();
    }

    public function getAllWithHistorial(){
        return $this->iAgendamientoRepository->getAllAgendamientosWithHistorial();
    }
}