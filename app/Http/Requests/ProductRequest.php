<?php

namespace App\Http\Requests;

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
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3'
            ],
            'price' => [
                'required'
            ],
            'in_stock' => [
                'required'
            ],
            'value_attr.0' => [
                'required'
            ],
            'image1' => 'required',
            'image1.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'image1.required' => 'The first image field is required.',
            'value_attr.0.required' => 'The first field value attribute is required.',
        ];
    }
}
