<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "name" => "string|required|min:2|max:50",
            "slug" => "required|string|min:2",
            "description" => "required|min:2",
            "excerpt" => "required|min:2",
            "quantity" => "required|integer",
            "price" => "required|integer",
            "category_id" => "required|exists:categories,id",
            "color_id" => "required|exists:colors,id",
            "size_id" => "required|exists:sizes,id"
        ];

        if ($this->isMethod("PUT") || $this->isMethod("PATCH")){
            $rules['name'] = "nullable|string|min:2|max:50";
            $rules["slug"] = "nullable|string|min:2";
            $rules["description"] = "nullable|min:2";
            $rules["excerpt"] = "nullable|min:2";
            $rules["quantity"] = "nullable|integer";
            $rules["price"] = "nullable|integer";
            $rules["category_id"] = "nullable|exists:categories,id";
            $rules["color_id"] = "nullable|exists:colors,id";
            $rules["size_id"] = "nullable|exists:sizes,id";
        }

        return $rules;
    }
}
