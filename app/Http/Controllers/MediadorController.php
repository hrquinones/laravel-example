<?php
// Doc about facades:
// https://mcalvaro.gitbook.io/laravel-10-documentacion-en-espanol/reference/conceptos-arquitectura/facades#introduccion
// https://diegooo.com/facades-en-laravel-que-es-y-como-funciona/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Services\MediadorService; --remplazamos por Facades abajo
use Facades\App\Services\MediadorService;
use Illuminate\Support\Facades\Log;
use Exception;

class MediadorController extends Controller
{

    protected $mediadorService;

/*     public function __construct(MediadorService $mediadorService)
    {
        $this->mediadorService = $mediadorService;
    } */

    // phpcs:ignore
    /**
     * @OA\Get(
     * path="/api/mediador",
     * summary="Get mediadores",
     * description="Mostrar todos los mediadores",
     * tags={"mediador"},
     *   @OA\Response(
     *     response=200,
     *     description="Success"
     *   )
     * )
     */
    public function show()
    {
        try {
            $mediadores = MediadorService::getAll();
            return $mediadores;
        } catch (Exception $e) {
            Log::error('MediadorController->show() - sin paremetros: '.$e);
            return response()->json(['code' => 500, 'error' => $e->getMessage()], 500);
        }
    }


    public function show_sin_manejo_error()
    {
        $mediadores = MediadorService::getAll();
        return $mediadores;
    }


    // phpcs:ignore
    /**
     * @OA\Get(
     * path="/api/mediador/{id}",
     * summary="Get mediadores by Id",
     * description="Mediador por Id",
     * tags={"mediador"},
     *   @OA\Parameter(
     *      parameter="id",
     *      in="path",
     *      name="id",
     *      description="parameter by Id Mediator. Set default Lionel Messi",
     *      @OA\Schema(
     *          type="string",
     *          default="213d18e8-27be-48af-9e67-b1b1c4a96575",
     *      )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Success"
     *   )
     * )
     */
    public function get($id)
    {
        $mediador = MediadorService::get($id);
        return $mediador;
    }

    public function post(Request $request)
    {
        try {
            Log::info("Mediadorcontroller->Post {$request}");

            $data = $request->validate([
                'last_name'  => ['required','max:80'],
                'first_name'  => ['required'],
                'dt_birth' => ['required','date'],
                'document_type' => ['required','max:3'],
                'document_id' => ['required','max:12']
            ]);


            $response = MediadorService::create($data);
            return response()->json($response);
        } catch (\Throwable $th) {
            Log::error('MediadorController->post() errores: '.$th);
            return response()->json(['code' => 500, 'error' => $th->getMessage()], 500);
        }
    }
}
