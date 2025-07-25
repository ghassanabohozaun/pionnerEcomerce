<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|string|max:30',
            //'g-recaptcha-response' => 'required|captcha'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'required' => __('validation.required'),
    //         'email' => __('validation.email'),
    //         'string' => __('validation.string'),
    //         'max.string' => __('validation.max'),
    //     ];
    // }
}
