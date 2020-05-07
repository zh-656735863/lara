<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *验证规则
     * @return bool
     */
    public function authorize()
    {
        #return false;
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
            'username'=>'required|between:2,6',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'email'=>'required|email',
        ];
    }
}
