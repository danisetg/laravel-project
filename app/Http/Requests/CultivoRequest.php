<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CultivoRequest extends FormRequest
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
            'nombre' => 'required|max:50',
            'fecha_siembra' => 'required',
            'area' => 'required',
            'campo_id' => 'required',
            'variedad_id' => 'required',
            'fenologia_id' => 'required',
            'coordenada_id' => 'required',
        ];
    }
}
