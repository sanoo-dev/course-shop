<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'name' => 'required|max:255',
            'image' => 'mimes:jpg,bmp,png',
            'desc' => 'required',
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên khoá học.',
            'name.max' => 'Tên khoá học quá dài',
            'image.mimes' => 'Ảnh không hợp lệ.',
            'desc.required' => 'Vui lòng nhập mô tả khoá học.',
            'price.required' => 'Vui lòng nhập giá trị học phí.',
            'price.numeric' => 'Giá trị học phí không hợp lệ.',
        ];
    }
}
