<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => 'numeric|exists:customers,id',
            'total' => 'numeric|gte:0',
            'status' => 'string|in:pending,cancelled,paid',
            'paid_at' => 'date|nullable',
        ];
    }
}
