<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAdminRegister extends FormRequest
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
            //Enter validation rules for Admin Register Form
            'fname' => 'required|min:4',
            'lname' => 'required|min:4',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'fname.required' => 'Enter firstname',
            'fname.min' => 'Firstname must contain more than 3 characters',
            'lname.required' => 'Enter lastname',
            'lname.min' => 'Lastname must contain more than 3 characters',
            'email.required' => 'Enter email',
            'email.email' => 'Enter a correct email',
            'email.exists' => 'Email already exists',
            'password.required' => 'Enter password',
            'password.min' => 'Password must contain more than 6 characters',
            'password.confirmed' => 'Passwords do not match'
        ];
    }
}
