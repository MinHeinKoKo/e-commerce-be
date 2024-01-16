<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
        $rules = [
            'colorName' => "required|min:3|max:25|string",
            'hexCode' => "required|min:3"
        ];

        if ($this->isMethod("PUT") || $this->isMethod("PATCH")){
            $rules['colorName'] = "nullable|min:3|max:25|string";
            $rules['hexCode'] = "nullable|min:3";
        }

        return $rules;
    }
}
