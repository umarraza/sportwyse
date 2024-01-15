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
        dd($this->players);

        return [
            'players.*.id' => [
                'required',
                Rule::unique('player_team', 'player_id')->where(function ($query) {
                    $query->where('status', 'Primary');
                    $query->where('team_id', $this->team->id);
                }),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'players.*.id.required' => 'The player field is required.',
            'players.*.id.unique' => 'The player has already been taken.',
        ];
    }   
}
