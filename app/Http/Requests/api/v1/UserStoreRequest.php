<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class UserStoreRequest extends FormRequest
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
            'username' => 'required|string|max:255|min:7|alpha_dash:ascii',
            'email' => 'required|string|email|max:255|min:8', 
            'password' => 'required|string|min:8|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Username is required',
            'username.string' => 'Username must be a string',
            'username.max' => 'Username must be less than 255 characters',
            'username.min' => 'Username must be at least 7 characters',
            'username.alpha_dash' => 'Username must be alphanumeric',
            'email.required' => 'Email is required',
            'email.string' => 'Email must be a string',
            'email.email' => 'Email must be a valid email address',
            'email.max' => 'Email must be less than 255 characters',
            'email.min' => 'Email must be at least 8 characters',
            'password.required' => 'Password is required',
            'password.string' => 'Password must be a string',
            'password.max' => 'Password must be less than 255 characters',
            'password.min' => 'Password must be at least 8 characters',
        ];
    }
}
