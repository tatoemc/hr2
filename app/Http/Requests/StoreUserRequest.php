<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest 
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users,phone',
            'roles_name' => 'required',
            'job_id' => 'required',
            'degree_id' => 'required',
            'specialty_id' => 'required',
        ];
    }
    public function messages()
    {
        return [

            'name.required' =>'يرجي ادخال  اسم ',
            'address.required' =>'يرجي ادخال  العنوان ',
            'address.required' =>'يرجي ادخال  العنوان ',
            'email.required' =>'البريد الالكتروني مطلوب ',
            'email.unique' =>'البريد الالكتروني موجود بالفعل',
        ];
    }


}
