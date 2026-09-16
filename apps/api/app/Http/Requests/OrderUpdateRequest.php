<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => 'numeric|nullable|exists:customers,id',
            'total' => 'numeric|nullable|gte:0',
            'status' => 'string|nullable|in:pending,cancelled,paid',
            'paid_at' => 'date|nullable',
        ];
    }
}
