<?php

namespace App\Services;

use App\Models\Mediador;
use Illuminate\Support\Facades\Log;

class MediadorService
{
    public function getAll()
    {
        $mediadores = Mediador::all();
        return $mediadores;
    }

    public function getAll_trhowable()
    {
        try {
            $mediadores = Mediador::all();
            return $mediadores;
        } catch (\Throwable $th) {
            Log::error('MediadorService->getAll() - sin paremetros: '.$th);
            return response()->json(['code' => 400, 'error' => $th->getMessage()], 400);
        }
    }


    public function get($id)
    {
        $mediador = Mediador::findOrfail($id);
        return $mediador;
    }

    public function create($request)
    {

        Log::info("MediadorService->save - request: ".implode(',', $request));
        $mediador = new Mediador;
        // $mediador->id = $request->input("id");
        $mediador->first_name = $request["first_name"];
        $mediador->last_name = $request["last_name"];
        $mediador->dt_birth = $request["dt_birth"];
        $mediador->document_type = $request["document_type"];
        $mediador->document_id = $request["document_id"];
        // $mediador->sex = $request->input("sex");
        $mediador->distrito = "Capital";

        $resp = $mediador->save();

        Log::info("MediadorService->save - response: ". $resp);

        return $mediador;
    }
}
