<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessinfoStoreRequest extends FormRequest
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
            'business_name' => [ 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'audience_need' => [ 'max:255', 'string'],
            'business_model' => [ 'max:255', 'string'],
            'target_market' => [ 'max:255', 'string'],
            'competition_ad' => [ 'max:255', 'string'],
            'management_team' => [ 'max:255', 'string'],
            'loan_amount' => [ 'max:255'],
            'loan_reason' => [ 'max:255', 'string'],
        ];
    }
}
