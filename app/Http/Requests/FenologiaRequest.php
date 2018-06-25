<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FenologiaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|unique:fenologia,id|max:50',
            'abreviatura' => 'required|unique:fenologia,id|max:5',
        ];
    }
}
