<?php

namespace App\Http\Requests\Staff;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AddPlayerInTeamRequest extends FormRequest
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
            
        ];
        // return [
        //     'players.*.id.1.id' => [
        //         'required',
        //         Rule::unique('player_team', 'player_id')->where(function ($query) {
        //             $query->where('status', 'Primary');
        //         }),
        //     ],
        // ];
    }
}
