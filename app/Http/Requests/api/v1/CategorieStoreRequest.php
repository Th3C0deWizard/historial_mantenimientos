<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;

class CategorieStoreRequest extends FormRequest
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
            'name' => 'required|string|max:50|min:5|unique:categories,name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de la categoria es requerido',
            'name.string' => 'El nombre de la categoria debe ser una cadena de caracteres',
            'name.max' => 'El nombre de la categoria puede contener hasta 50 caracteres',
            'name.min' => 'El nombre de la categoria debe contener al menos 5 caracteres',
            'name.unique' => 'El nombre de la categoria ya esta en uso',
        ];
    }
}
