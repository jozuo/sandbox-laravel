<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class ChirpUpdateRequest extends FormRequest
{

    public function authorize(): Response
    {
        $chirp = $this->route()->parameter('chirp');
        return Gate::authorize('update', $chirp);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // TODO 他FormRequestと共通のバリデーションルールはどこに定義する？
        return (new ChirpStoreRequest())->rules();
    }
}
