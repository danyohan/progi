<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'budget'     => 'required|numeric',
            'vehicleType' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'budget' => 'The budget is required',
            'vehicleType' => 'The type Vehicle is required'
        ];
    }
}
