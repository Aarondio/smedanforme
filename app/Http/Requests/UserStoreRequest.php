<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'middlename' => ['required', 'max:255', 'string'],
            'gender' => ['max:255', 'string'],
            'nationality' => ['max:255', 'string'],
            'state' => ['max:255', 'string'],
            'lga' => ['max:255', 'string'],
            'address' => ['max:255', 'string'],
            'email' => ['required', 'unique:users,email', 'email'],
            'phone' => ['max:255', 'string'],
            'password' => ['required'],
        ];
    }


}
