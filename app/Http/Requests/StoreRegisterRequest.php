<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
            'student_name' => 'required|max:255',
            'student_email' => 'required',
            'student_phone' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'student_name.required' => 'Vui lòng nhập họ và tên.',
            'student_email.required' => 'Vui lòng nhập email.',
            'student_phone.required' => 'Vui lòng nhập số điện thoại.',
            'student_phone.numeric' => 'Số điện thoại không hợp lệ.',
        ];
    }
}
