<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateLogin extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:8|max:32'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Email không đúng định dạng!',
            'password.required' => 'Password không được để trống!',
            'password.min' => 'Mật khẩu phải hơn 8 ký tự.',
            'password.max' => 'Mật khẩu phải không được vượt quá 32 ký tự.'
        ];
    }
}
