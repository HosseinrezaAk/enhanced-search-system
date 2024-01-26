<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'year' => 'sometimes|integer|min:1900|max:' . date('Y'),
            'rank' => 'sometimes|numeric|between:0,10',
            'description' => 'sometimes|string',
            'genre_id' => 'sometimes|exists:genres,id',
            'crew_ids' => 'sometimes|array',
            'crew_ids.*' => 'sometimes|exists:crews,id',
        ];
    }
}
