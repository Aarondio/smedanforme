<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashflowStoreRequest extends FormRequest
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
            'directin_one' => ['required', 'max:255'],
            'directin_two' => ['required', 'max:255'],
            'directin_three' => ['required', 'max:255'],
            'directin_four' => ['required', 'max:255'],
            'indirectin_one' => ['required', 'max:255'],
            'indirectin_two' => ['required', 'max:255'],
            'indirectin_three' => ['required', 'max:255'],
            'indirectin_four' => ['required', 'max:255'],
            'wages_one' => ['required', 'max:255'],
            'wages_two' => ['required', 'max:255'],
            'wages_three' => ['required', 'max:255'],
            'wages_four' => ['required', 'max:255'],
            'capitalcost_one' => ['required', 'max:255'],
            'capitalcost_two' => ['required', 'max:255'],
            'capitalcost_three' => ['required', 'max:255'],
            'capitalcost_four' => ['required', 'max:255'],
            'businessinfo_id' => ['required', 'exists:businessinfos,id'],
        ];
    }
}
