<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampoRequest extends FormRequest
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
            'nombre' => 'required|unique:campo|max:50',
            'abreviatura' => 'required|unique:campo|max:5',
            'numero' => 'required|max:20',
            'unidad_id' => 'required',
            'municipio_id' => 'required',
        ];
    }
}
