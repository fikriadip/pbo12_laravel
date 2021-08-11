<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'string', 'max:255', 'min:4',
            ],
            'username' => [
                'required', 'string', 'max:20', 'min:6',
                Rule::unique('users', 'username')->ignore(Auth::user()->id)
            ],
            'email' => [
                'required', 'email', 'max:120',
                Rule::unique('users', 'email')->ignore(Auth::user()->id)
            ],
        ];
    }
}