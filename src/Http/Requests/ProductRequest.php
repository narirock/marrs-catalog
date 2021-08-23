<?php

namespace Marrs\MarrsCatalog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'slug' => 'required|unique:catalog_products,slug,' . $this->product
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Preencha o campo Nome do produto',
            'slug.required' => 'O produto precisa de um slug',
            'slug.unique' => 'O slug já foi utilizado em outro produto'
        ];
    }
}
