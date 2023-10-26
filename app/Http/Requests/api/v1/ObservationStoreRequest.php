<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;

class ObservationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|integer|exists:categories,id',
            'message' => 'required|string|max:255|min:8',
            'computer_id' => 'required|integer|exists:computers,id',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'La categoría es requerida',
            'category_id.integer' => 'La categoría debe ser un número entero',
            'category_id.exists' => 'La categoría no existe',
            'message.required' => 'El mensaje es requerido',
            'message.string' => 'El mensaje debe ser una cadena de texto',
            'message.max' => 'El mensaje debe tener máximo 255 caracteres',
            'message.min' => 'El mensaje debe tener mínimo 8 caracteres',
            'computer_id.required' => 'La computadora es requerida',
            'computer_id.integer' => 'La computadora debe ser un número entero',
            'computer_id.exists' => 'La computadora no existe',
        ];
    }
}
