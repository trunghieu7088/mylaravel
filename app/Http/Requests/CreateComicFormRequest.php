<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


Class CreateComicFormRequest extends FormRequest
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
            'title' => 'required|max:100|min:3|unique:App\Models\Comic,title',
            'author' => 'required|max:100|min:3',
            'imageupload' => 'required|max:1000|min:3|mimes:png,jpg,jpeg',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Name is required!',
            'author.required' => 'Author is required!',
            'title.max' => 'title Max is 100 characters',
            'author.max' => 'Author Max is 100 characters',
            'title.min' => 'title Min is 3 characters',
            'author.min' => 'Author Min is 3 characters',
            'imageupload.required' => 'need to insert image',
        ];
    }
    protected function failedValidation(Validator $validator)
    {        
        throw new HttpResponseException(response()->json($validator->errors(), 200));                 
    }
   
   
}

