<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCitaRequest;
use App\Http\Requests\UpdateCitaRequest;
use App\Models\Cita;
use Illuminate\Http\JsonResponse;

class CitaController extends Controller
{
    public function index(): JsonResponse
    {
        $citas = Cita::with('paciente')
            ->orderBy('fecha')
            ->get();

        return response()->json($citas);
    }

    public function store(StoreCitaRequest $request): JsonResponse
    {
        $cita = Cita::create(
            $request->validated()
        );

        return response()->json($cita, 201);
    }

    public function show(Cita $cita): JsonResponse
    {
        return response()->json(
            $cita->load('paciente')
        );
    }

    public function update(UpdateCitaRequest $request, Cita $cita): JsonResponse
    {
        $cita->update($request->validated());

        return response()->json($cita);
    }

    public function destroy(Cita $cita): JsonResponse
    {
        $cita->delete();

        return response()->json(null, 204);
    }
}
