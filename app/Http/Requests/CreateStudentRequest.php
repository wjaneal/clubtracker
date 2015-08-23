<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateStudentRequest extends Request
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
            'slname'=>'required|string',
	    'sfname'=>'required|string',
	    'snname'=>'required|string',
	    'country'=>'required|string',
	    'gender'=>'required|string',
	    'grade'=>'required|integer',
	    'email'=>'required|email'
        ];
    }
}
