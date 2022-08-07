<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductDetailsRequest extends FormRequest
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
            'product_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'qty' => 'required|max:15',
            'price' => 'required|max:15',
        ];
        return ($rules);
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Please Enter product',
            'color_id.required' => 'Please Enter color',
            'size_id.required' => 'Please Enter size',
            'qty.required' => 'Please Enter qty',
            'price.required' => 'Please Enter price',
        ];
    }
}
