<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:12'],
        ];
    }

    public function messages(): array
    {
        return
            [
                'email.required' => __('validation.required'),
                'email.email' => __('validation.email'),
                'email.exists' => __('validation.exists'),
                'password.required' => __('validation.required'),
                'password.string' => __('validation.string'),
                'password.min' => __('validation.min.string'),
                'password.max' => __('validation.max.string'),
            ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        if ($this->expectsJson() || $this->is('api/*')) {
            throw new HttpResponseException(response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422));
        }

        throw (new ValidationException($validator))
            ->redirectTo($this->getRedirectUrl());
    }
}
