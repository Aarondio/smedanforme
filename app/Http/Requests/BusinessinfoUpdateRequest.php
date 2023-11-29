<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessinfoUpdateRequest extends FormRequest
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
            'business_name' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'audience_need' => ['required', 'max:255', 'string'],
            'business_model' => ['required', 'max:255', 'string'],
            'target_market' => ['required', 'max:255', 'string'],
            'competition_ad' => ['required', 'max:255', 'string'],
            'management_team' => ['required', 'max:255', 'string'],
            'loan_amount' => ['required', 'max:255'],
            'loan_reason' => ['required', 'max:255', 'string'],
        ];
    }
}
