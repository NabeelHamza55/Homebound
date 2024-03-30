<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|regex:/^[A-Za-z\s]+$/|min:3|max:40',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|regex:/^[0-9]{8,}$/|unique:users',
            'password' => 'required|min:8',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
