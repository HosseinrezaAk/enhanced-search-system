<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'rank' => 'required|numeric|between:0,10',
            'description' => 'required|string',
            'genre_id' => 'required|exists:genres,id',
            'crew_ids' => 'required|array|min:1',
            'crew_ids.*' => 'exists:crews,id',
        ];
    }
}
