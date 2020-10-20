<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class projetRequest extends FormRequest
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
            'name' => 'bail|required|max:80|alpha',
            'short_description' => 'max:80',
            'description' => 'bail|required|email'
        ];
    }
}