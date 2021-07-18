<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        // dd($this->route('product'));
        return [
            //
            'name' => ['required','min:3', 'string','max:255','Filter:php,css',
                    //   Rule::unique('products')->ignore($this->product)
                ],
            'category_id'=>['required', 'int','exists:categories,parent_id'],
            'description' => ['nullable', 'min:3', 'string'],
            'sku' => ['nullable', 'min:1', 'string',
                      Rule::unique('products')->ignore($this->product)],
            'price' => ['nullable', 'min:0', 'numeric'],
            'sale_price' => ['nullable', 'min:0', 'numeric'],
            'width' => ['nullable', 'min:0', 'numeric'],
            'height' => ['nullable', 'min:0', 'numeric'],
            'length' => ['nullable', 'min:0', 'numeric'],
            'wight' => ['nullable', 'min:0', 'numeric'],
            'quantity' => ['nullable', 'min:0', 'numeric'],
            'status'=> ['required', 'in:active,draft'],
            'image'=> ['nullable', 'image', 'dimensions:min-width:300px'] 
        ];
    }
}
