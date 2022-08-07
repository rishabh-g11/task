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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules =  [
            'name' => 'required|max:60',
            'brand_name' => 'required|max:60',
            'description' => 'required|max:200',
            'model_name' => 'required|max:15',
        ];
        return ($rules);
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter name',
            'brand_name.required' => 'Please Enter brand name',
            'description.required' => 'Please Enter description',
            'model_name.required' => 'Please Enter model name',
        ];
    }
}
