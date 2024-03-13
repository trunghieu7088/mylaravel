<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentFormRequest extends FormRequest
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
            'StudentName' => 'bail|required|max:10|min:3',
            'StudentClass' => 'bail|required|max:2|min:1',
        ];
    }
    public function messages()
    {
        return [
            'StudentName.required' => 'Name is required!',
            'StudentClass.required' => 'Class is required!',
            'StudentName.max' => 'Name Max is 10 characters',
            'StudentClass.max' => 'Class Max is 2 characters',
            'StudentName.min' => 'Name Min is 3 characters',
            'StudentClass.min' => 'Class Min is 1 characters',
        ];
    }
    public function withValidator($validator)
    {        
         
         if ($validator->stopOnFirstFailure()->fails()) {
            $errors = $validator->errors();
            if($errors->has('StudentName'))
            {
                $ErrMessage=$errors->first('StudentName');
            }
            else
            {
                $ErrMessage=$errors->first('StudentClass');   
            }
           return redirect()->route('CreateStudent')->with('message',$ErrMessage)->with('status','fail');
        }    
    }
   
}

