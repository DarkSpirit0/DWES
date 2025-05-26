<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:50',
            'team_id' => 'nullable|exists:teams,id', // Permite que el jugador no tenga equipo asignado
            'height' => 'required|numeric|min:0', // Altura en centímetros
            'weight' => 'required|numeric|min:0', // Peso en kilogramos
        ];
    }
}
