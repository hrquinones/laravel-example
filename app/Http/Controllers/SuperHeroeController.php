<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SuperHeroeService;

class SuperHeroeController extends Controller
{

    protected $superHeroeService;

    public function __construct(SuperHeroeService $superHeroeService)
    {
        $this->superHeroeService = $superHeroeService;
    }


    // phpcs:ignore
    /**
     * @OA\Get(
     * path="/api/super-heroe/search/{name}",
     * summary="Get super heroe por nombre",
     * description="Mostrar todos los super heroes",
     * tags={"mediador"},
     *   @OA\Parameter(
     *      parameter="name",
     *      in="path",
     *      name="name",
     *      description="parameter by name super-hero",
     *      @OA\Schema(
     *          type="string",
     *          default="batman",
     *      )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Success"
     * ))
     */
    public function search($name)
    {
        $response = $this->superHeroeService->getByName($name);
        return $response;
    }


    public function get($id)
    {
        $response = $this->superHeroeService->getById($id);
        return $response;
    }
}
