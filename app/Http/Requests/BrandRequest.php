<?php

namespace App\Http\Requests;

use App\Models\Brand;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
            {
                $validation = [
                    'name' => [
                        'required', 'min:3'
                    ],
                    'sort_order' => [
                        'required'
                    ],
                    'image' => 'required','|image|mimes:jpeg,png,jpg,gif,svg|max:512'
                ];
            }
            case 'PUT':
                $validation = [
                    'name' => [
                        'required', 'min:3'
                    ],
                    'sort_order' => [
                        'required'
                    ],
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:512'
                ];
            default:break;
        }
        return $validation;
    }
}
