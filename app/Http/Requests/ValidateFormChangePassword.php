<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormChangePassword extends FormRequest
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
            'password' => 'required|min:6|max:12|regex:[^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$]',
            'newpass' => 'required|min:6|max:12|regex:[^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$]',
            'confirmpass' => 'required|min:6|max:12|regex:[^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$]',
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu không được để trống!',
            'password.min' => 'Mật khẩu không được ít hơn 6 ký tự',
            'password.max' => 'Mật khẩu không được quá hơn 12 ký tự',
            'password.regex' => 'Mật khẩu phải có chữ và số (Không có ký tự đặc biệt!)',
            'newpass.required' => 'Mật khẩu không được để trống!',
            'newpass.min' => 'Mật khẩu không được ít hơn 6 ký tự',
            'newpass.max' => 'Mật khẩu không được quá hơn 12 ký tự',
            'newpass.regex' => 'Mật khẩu phải có chữ và số (Không có ký tự đặc biệt!)',
            'confirmpass.required' => 'Mật khẩu không được để trống!',
            'confirmpass.min' => 'Mật khẩu không được ít hơn 6 ký tự',
            'confirmpass.max' => 'Mật khẩu không được quá hơn 12 ký tự',
            'confirmpass.regex' => 'Mật khẩu phải có chữ và số (Không có ký tự đặc biệt!)',
        ];
    }
}
