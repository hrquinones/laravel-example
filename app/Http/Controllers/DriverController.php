<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class DriverController extends Controller
{

    protected $mediadorService;


    // phpcs:ignore
    /**
     * @OA\Get(
     * path="/api/drivers",
     * summary="Get PDO driver",
     * description="Mostrar los driver PDOs instalados",
     * tags={"configuration"},
     *   @OA\Response(
     *     response=200,
     *     description="Success"
     *   )
     * )
     */
    public function drivers()
    {
        return PDO::getAvailableDrivers();
    }
}
