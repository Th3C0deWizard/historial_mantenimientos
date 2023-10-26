<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;

class ComputerStoreRequest extends FormRequest
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
            'name' => 'required|string|max:10|min:3|unique:computers,name',
            'brand' => 'required|string|max:50|min:3',
            'ram' => 'required|integer|min:2|max:64',
            'cpu' => 'required|string|max:30|min:3',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de caracteres',
            'name.max' => 'El nombre debe tener máximo 10 caracteres',
            'name.min' => 'El nombre debe tener mínimo 3 caracteres',
            'name.unique' => 'El nombre ya existe en la base de datos',
            'brand.required' => 'La marca es requerida',
            'brand.string' => 'La marca debe ser una cadena de caracteres',
            'brand.max' => 'La marca debe tener máximo 50 caracteres',
            'brand.min' => 'La marca debe tener mínimo 3 caracteres',
            'ram.required' => 'La memoria RAM es requerida',
            'ram.integer' => 'La memoria RAM debe ser un número entero',
            'ram.min' => 'La memoria RAM debe ser mínimo de 2 GB',
            'ram.max' => 'La memoria RAM debe ser máximo de 64 GB',
            'cpu.required' => 'El procesador es requerido',
            'cpu.string' => 'El procesador debe ser una cadena de caracteres',
            'cpu.max' => 'El procesador debe tener máximo 30 caracteres',
            'cpu.min' => 'El procesador debe tener mínimo 3 caracteres',
        ];
    }
}
