<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|required|max:200',
            'description' => 'string|nullable',
            'price' => 'numeric|gte:0',
            'stock' => 'numeric|gte:0',
            'position' => 'numeric|gte:0',
            'enabled' => 'boolean',
        ];
    }
}
