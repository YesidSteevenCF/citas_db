<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCitaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
        'paciente_id' => ['sometimes', 'exists:pacientes,id'],
        'fecha' => ['sometimes', 'date', 'after_or_equal:today'],
        'hora' => ['sometimes', 'date_format:H:i'],
        'motivo' => ['sometimes', 'string', 'max:255'],
        'estado' => ['sometimes', 'in:pendiente,confirmada,cancelada'],
        ];
    }
}
