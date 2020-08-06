<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class ValidateRegister extends FormRequest
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
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone|min:10|max:12',
            'password' => 'required|min:6|max:12|regex:[^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$]',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Email không đúng định dạng!',
            'email.unique' => 'Email đã tồn tại!',
            'phone.required' => 'Số điện thoại không được để trống!',
            'phone.min' => 'Số điện thoại không được dưới 10 số! Ví dụ: 098.xxx.xxxx',
            'phone.max' => 'Số điện thoại không được quá 12 số! Ví dụ: 098.xxx.xxxx',
            'phone.unique' => 'Số điện thoại đã tồn tại!',
            'password.required' => 'Mật khẩu không được để trống!',
            'password.min' => 'Mật khẩu không được ít hơn 6 ký tự',
            'password.max' => 'Mật khẩu không được quá hơn 12 ký tự',
            'password.regex' => 'Mật khẩu phải có chữ và số (Không có ký tự đặc biệt!)',
        ];
    }
}
