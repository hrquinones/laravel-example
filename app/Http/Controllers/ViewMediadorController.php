<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MediadorService;

class ViewMediadorController extends Controller
{

    protected $mediadorService;

    public function __construct(MediadorService $mediadorService)
    {
        $this->mediadorService = $mediadorService;
    }

    public function index()
    {

        $mediadores = $this->mediadorService->getAll();
        
        // Retornar la vista con las personas sorteadas
        return view('mediador.index', compact('mediadores'));
    }


    public function get($id)
    {
        $mediador = $this->mediadorService->get($id);
        return $mediador;
    }
}
