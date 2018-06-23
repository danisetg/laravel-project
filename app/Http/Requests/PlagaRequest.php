<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlagaRequest extends FormRequest
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
            'nombre_cientifico' => 'required|unique:plaga,id|max:50',
            'nombre_vulgar' => 'required|unique:plaga,id|max:50',
        ];
    }
}
