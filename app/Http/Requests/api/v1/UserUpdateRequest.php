<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'username' => 'string|alpha_dash:ascii|max:80|min:7|unique:users,username',
            'email' => 'email|min:8|max:255|unique:users,email',
            'password' => 'missing',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'El nombre de usuario es requerido',
            'username.string' => 'El nombre de usuario debe ser una cadena de caracteres',
            'username.alpha_dash' => 'El nombre de usuario debe contener caracteres alfabeticos guiones y guiones bajos',
            'username.max' => 'El nombre de usuario debe contener menos de 80 caracteres',
            'username.min' => 'El nombre de usuario debe contener al menos 7 caracteres',
            'email.required' => 'El correo electronico es requerido',
            'email.email' => 'El correo electronico debe ser una direccion de correo valida',
            'email.min' => 'El correo electronico debe contener al menos 8 caracteres',
            'email.max' => 'El correo electronico debe contener menos de 255 caracteres',
            'email.unique' => 'El correo electronico ya esta en uso',
            'password.missing' => 'La contraseña no puede ser actualizada desde este recurso',
        ];
    }
}
