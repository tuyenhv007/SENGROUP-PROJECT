<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePostHouse extends FormRequest
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
            'name' => 'required|max:100',
            'type' => 'required|max:100',
            'city' => 'required',
            'district' => 'required',
            'road' => 'required',
            'sn' => 'required|max:100',
            'desc' => 'required|max:500',
            'rooms' => 'required|max:4',
            'price' => 'required|max:15',
            'photos[]' =>'
            required|
            image:jpeg,png,jpg|
            size:10240|
            dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tiêu đề không được để trống!',
            'name.max' => 'Tiêu đề tối đa là 100 ký tự!',
            'type.required' => 'Kiểu nhà không được để trống!',
            'type.max' => 'Tên kiểu nhà tối đa là 100 ký tự',
            'city.required' => 'Thành phố không được để trống!',
            'district.required' => 'Quận huyện không được để trống!',
            'road.required' => 'Xã phường không được để trống!',
            'sn.required' => 'Địa chỉ không được để trống!',
            'sn.max' => 'Địa chỉ vượt quá ký tự cho phép là 100',
            'desc.required' => 'Mô tả không được để trống!',
            'desc.max' => 'Mô tả tối đa là 500 ký tự!',
            'rooms.required' => 'Số phòng không được để trống!',
            'rooms.max' => 'Số phòng quá lớn!',
            'price.required' => 'Giá không được để trống!',
            'price.max' => 'Giá cho thuê quá lớn!',
            'photos[].required' => 'Bạn chưa chọn ảnh!',
            'photos[].image' => 'Ảnh không đúng đính dạng: jpeg,png,jpg',
            'photos[].size' => 'Dung lượng ảnh tối đa là 10Mb',
            'photos[].dimensions' => 'Kích cỡ ảnh phù hợp là từ: 100x100 - 1000x1000'
        ];
    }
}
