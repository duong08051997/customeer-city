<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'image'=>'required',
            'name'=>'required',
            'email'=>'required',
            'date'=>'required|date|before:today'
        ];
    }
    public function messages()
    {
        return [
            'image.required'=>'Ảnh không được để trống',
            'name.required'=>'Tên khách hàng không được để trống ',
            'email.required'=>'Email không được để trống',
            'date.required'=>'Ngày sinh không được để trống',
            'date.before'=>'Ngày sinh không đúng'

        ];


    }
}
