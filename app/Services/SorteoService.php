<?php

namespace App\Services;

use App\Services\SuperHeroeService;
use App\Services\MediadorService;
use Illuminate\Support\Facades\Log;

class SorteoService
{
    //
    protected $superHeroeService;
    protected $mediadorService;

    public function __construct(SuperHeroeService $superHeroeService, MediadorService $mediadorService)
    {
        $this->superHeroeService = $superHeroeService;
        $this->mediadorService = $mediadorService;
    }

    public function sortearSuperMediador()
    {
        
        $min = 1;
        $max = 731;
        $idSorteado = random_int($min, $max);
        Log::info("SORTEO SuperMediador - parmetros: min->{$min} max->{$max} - resultado: {$idSorteado}");

        $superMediador = $this->superHeroeService->getById($idSorteado);
        return $superMediador;
    }

    public function sortearMediador()
    {
        // Obtener todas las personas participantes
        $mediadores = $this->mediadorService->getAll();

        $mediadorSorteado = 'null';

        // Realizar el sorteo
        while ($mediadores->isNotEmpty()) {
            // Generar un número aleatorio entre 0 y el tamaño de la lista de personas - 1
            $indice = random_int(0, $mediadores->count() - 1);
            
            // Obtener la persona sorteada
            $mediadorSorteado = $mediadores->splice($indice, 1)->first();
        }
        
        return $mediadorSorteado;
        // Retornar la vista con las personas sorteadas
        // return view('sorteo.index', compact('bolillero'));
    }
}
