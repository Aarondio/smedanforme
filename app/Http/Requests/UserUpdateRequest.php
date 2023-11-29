<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'firstname' => ['required', 'max:255', 'string'],
            'surname' => ['required', 'max:255', 'string'],
            'middlename' => ['nullable'],
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($this->user),
                'email',
            ],
            'gender'=>'required',
            'nationality'=>'required',
            'state'=>'required',
            'lga'=>'required',
            'address'=>'required',

            'phone' => ['required', 'max:255', 'string'],
            'password' => ['nullable'],
        ];
    
    }
}
