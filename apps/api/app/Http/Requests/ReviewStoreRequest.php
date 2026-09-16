<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'numeric|exists:products,id',
            'customer_id' => 'numeric|exists:customers,id',
            'rating' => 'numeric|gte:1|lte:5',
            'comment' => 'string|required',
        ];
    }
}
