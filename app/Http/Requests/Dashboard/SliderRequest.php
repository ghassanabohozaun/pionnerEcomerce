<?php

namespace App\Http\Requests\Dashboard;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title.*' => ['required', 'string', 'max:50'],
            'details.*' => ['required', 'string', 'min:10', 'max:5000'],
            'status' => ['required', 'in:1,0'],
            'photo' => ['required_without:hidden_photo', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
        ];
    }
}
