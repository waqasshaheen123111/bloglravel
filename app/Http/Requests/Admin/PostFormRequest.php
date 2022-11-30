<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        $rules= [    
            'post_name'=>[
                'required',
                'string',
                'max:200'
            ],
            'slug'=>[
                'required',
                'string',
                'max:200'
            ],
            'description'=>[
                'required',
            ],
            'yt_iframe'=>[
                'nullable'
            ],
            'image'=>[
                'nullable',
                'mimes:jpeg,jpg,png,jfif,webp'
            ],
            'meta_title'=>[
                'required',
                'string',
                'max:200'
            ],
            'yt_iframe'=>[
                'nullable'
            ],
            'meta_description'=>[
                'required',
                'string'
            ],
            'meta_keyword'=>[
                'nullable',
                'string',
            ],
            'status'=>[
                'nullable',
                
            ],

        ];
        return $rules;
    }
}
