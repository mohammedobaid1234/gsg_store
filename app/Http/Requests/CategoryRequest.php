<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Filter;
class CategoryRequest extends FormRequest
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
            //
            'name' => ['required',
                     'min:3', 
                    'string', 
                    'max:255',
                    // function ($attribute, $value, $fail) 
                    //     {
                    //         if(stripos($value, 'gad') !== false){
                    //             $fail("you can't put $value word");
                    //         }
                    //     }
                    // new Filter(['larval' , 'php', 'gat'])
                    'Filter:php,css'
                ],
            'parent_id'=>['nullable', 'int','exists:categories,id'],
            'description' => ['nullable', 'min:3', 'string'],
            'status'=> ['required', 'in:active,draft'],
            'image'=> ['nullable', 'image', 'dimantion:min-width:300px'] 
        ];
    }
    public function messages()
    {
        return [

            'required' => 'this failed requerd ☺',
        ];
    }
}
