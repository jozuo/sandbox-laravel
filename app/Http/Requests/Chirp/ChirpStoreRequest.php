<?php

namespace App\Http\Requests\Chirp;

use Illuminate\Foundation\Http\FormRequest;

class ChirpStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'message' => 'required|string|max:20',
        ];
    }
}
