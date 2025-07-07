<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
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
            'code' => ['required', 'min:4' , 'max:10' , Rule::unique('coupons', 'code')->ignore($this->id)],
            'discount_percentage' => ['required', 'numeric' , 'between:1,100'],
            'start_date' => ['required', 'date' , 'after_or_equal:now'],
            'end_date' => ['required', 'date' , 'after:start_date'],
            'limit' => ['required', 'numeric'  ,'min:1'],
            'is_active' => ['required', 'boolean'],
        ];
    }
}
