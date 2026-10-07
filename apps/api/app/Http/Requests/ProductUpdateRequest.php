<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|nullable|max:200',
            'description' => 'string|nullable',
            'price' => 'numeric|nullable|gte:0',
            'stock' => 'numeric|nullable|gte:0',
            'position' => 'numeric|nullable|gte:0',
            'enabled' => 'boolean|nullable',
        ];
    }
}
