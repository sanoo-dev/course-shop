<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShoolRequest extends FormRequest
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
            'name' => 'required|unique:schools|max:255',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên trường hoặc trung tâm.',
            'name.unique' => 'Trường hoặc trung tâm đã tồn tại.',
            'name.max' => 'Tên trường hoặc trung tâm quá dài',
            'address.required' => 'Vui lòng nhập địa chỉ',
        ];
    }
}
