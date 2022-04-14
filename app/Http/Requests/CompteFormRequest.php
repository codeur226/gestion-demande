<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_user' => 'required|numeric',
            'id_role' => 'required|numeric',
            'actif' => 'required | boolean',
            'date_creation' => 'required | date',
        ];
    }
}
