<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'phone' => 'required|string|max:30',
            'type' => 'required|string|in:webmaster,advertiser|max:15',
            'telegram' => 'required|string|max:30',
            'about_self' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
