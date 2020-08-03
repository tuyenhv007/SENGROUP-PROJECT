<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagePost extends FormRequest
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
            'image' =>'
            required|
            image:jpeg,png,jpg|
            size:10240|
            dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Bạn chưa chọn ảnh!',
            'image.image' => 'Ảnh không đúng đính dạng: jpeg,png,jpg',
            'image.size' => 'Dung lượng ảnh tối đa là 10Mb',
            'image.dimensions' => 'Kích cỡ ảnh phù hợp là từ: 100x100 - 1000x1000'
        ];
    }
}
