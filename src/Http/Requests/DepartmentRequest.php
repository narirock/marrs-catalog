<?php

namespace Marrs\MarrsCatalog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required|unique:catalog_products,slug,' . $this->department
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Preencha o campo nome',
            'slug.required' => 'Preencha o campo slug',
            'slug.unique' => 'Este slug ja existe',
        ];
    }
}
