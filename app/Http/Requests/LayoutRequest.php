<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LayoutRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rule = [
            'titulo' => [
                'bail',
                'required',
                "unique:layouts",
                'max:255'
            ]
        ];

        if ($this->method()=='PUT') {
            $id = $this->layout->id;
            $rule = [
                'titulo' => [
                    'bail',
                    'required',
                    "unique:layouts,titulo,{$id},id",
                    'max:255'
                ]
            ];

        }

        return $rule;
    }

    public function messages()
    {
        return [
            'unique' => 'Já exite layout com esse titulo !'
        ];
    }
}
