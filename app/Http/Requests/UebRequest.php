<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UebRequest extends FormRequest
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
            'nombre' => 'required|unique:ueb|max:50',
            'abreviatura' => 'required|unique:ueb|max:5',
            'empresa_id' => 'required',
        ];
    }
}
