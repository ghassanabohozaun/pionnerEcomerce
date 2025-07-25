<?php

namespace App\Http\Requests\Dashboard;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
            'name.*' => ['required', 'max:100', UniqueTranslationRule::for('attributes')->ignore($this->id)],
            'value.*.*' => ['required', 'max:100'],
        ];
    }
}
