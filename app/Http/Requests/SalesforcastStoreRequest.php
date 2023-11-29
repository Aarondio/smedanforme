<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesforcastStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'jan_price' => ['required', 'numeric'],
            'feb_price' => ['required', 'numeric'],
            'mar_price' => ['required', 'numeric'],
            'apr_price' => ['required', 'numeric'],
            'may_price' => ['required', 'numeric'],
            'jun_price' => ['required', 'numeric'],
            'jul_price' => ['nullable', 'numeric'],
            'aug_price' => ['nullable', 'numeric'],
            'sep_price' => ['nullable', 'numeric'],
            'oct_price' => ['nullable', 'numeric'],
            'nov_price' => ['nullable', 'numeric'],
            'dec_price' => ['nullable', 'numeric'],
            'jan_qty' => ['required', 'max:255'],
            'feb_qty' => ['required', 'max:255'],
            'mar_qty' => ['required', 'max:255'],
            'apr_qty' => ['required', 'max:255'],
            'may_qty' => ['required', 'max:255'],
            'jun_qty' => ['required', 'max:255'],
            'jul_qty' => ['nullable', 'max:255'],
            'aug_qty' => ['nullable', 'max:255'],
            'sep_qty' => ['nullable', 'max:255'],
            'oct_qty' => ['nullable', 'max:255'],
            'nov_qty' => ['nullable', 'max:255'],
            'dec_qty' => ['nullable', 'max:255'],
            'jan_cost' => ['required', 'numeric'],
            'feb_cost' => ['required', 'numeric'],
            'mar_cost' => ['required', 'numeric'],
            'apr_cost' => ['required', 'numeric'],
            'may_cost' => ['required', 'numeric'],
            'jun_cost' => ['required', 'numeric'],
            'jul_cost' => ['nullable', 'numeric'],
            'aug_cost' => ['nullable', 'numeric'],
            'sep_cost' => ['nullable', 'numeric'],
            'oct_cost' => ['nullable', 'numeric'],
            'nov_cost' => ['nullable', 'numeric'],
            'dec_cost' => ['nullable', 'numeric'],
        ];
    }
}
