<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SorteoService;

class SorteoController extends Controller
{

    protected $sorteoService;

    public function __construct(SorteoService $sorteoService)
    {
        $this->sorteoService = $sorteoService;
    }

    // phpcs:ignore
    /**
     *  @OA\Examples(
     *     example="RequestExample",
     *     summary="An example request",
     *     value={
     *         "json": {
     *             "structure": "with stuff"
     *         }
     *         "arrays": {
     *             {
     *                 "are": "given as"
     *             },
     *             {
     *                  "objects": "for some reason"
     *             }
     *         }
     *     }
     * )
     */

     // phpcs:ignore
     /**
     * @OA\Post(
     * path="/api/sorteo",
     * summary="Sortear mediador",
     * description="Sortea un mediador o un super mediador",
     * tags={"mediador"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request Body Description",
     *         @OA\JsonContent(
     *           type="object",
     *           @OA\Property(
     *              property="type",
     *              type="string",
     *           ),
     *         ),
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Success"
     * )),
     */
    public function sorteo(Request $request)
    {

        if ($request['type'] === 'mediator') {
            $response = $this->sorteoService->sortearMediador();
        } elseif ($request['type'] === 'super-mediator') {
            $response = $this->sorteoService->sortearSuperMediador();
        } else {
            $response = 'type not permitied';
        }
        
        return $response;
    }
}
