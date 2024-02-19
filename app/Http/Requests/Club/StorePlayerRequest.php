<?php

namespace App\Http\Requests\Club;

use Illuminate\Foundation\Http\FormRequest;

class StorePlayerRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'phone'      => 'required|string|max:255',
            'gender'     => 'required|string|max:255',
            'address'    => 'required|string|max:255',
            'city'       => 'required|string|max:255',
            'state'      => 'required|string|max:255',
            'zip_code'   => 'required|string|max:255',
        ];
    }
}
