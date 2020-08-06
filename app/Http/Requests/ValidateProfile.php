<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProfile extends FormRequest
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
            'phone' => 'required|min:10|max:12|unique:users,phone,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'phone.required' => 'Số điện thoại không được để trống!',
            'phone.min' => 'Số điện thoại không được dưới 10 số! Ví dụ: 098.xxx.xxxx',
            'phone.max' => 'Số điện thoại không được quá 12 số! Ví dụ: 098.xxx.xxxx',
            'phone.unique' => 'Số điện thoại đã tồn tại!',
        ];
    }
}
