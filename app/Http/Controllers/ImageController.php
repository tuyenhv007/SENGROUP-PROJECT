<?php

namespace App\Http\Controllers;

use App\House;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage()
    {
        return view('house.image-form');
    }

    public function uploadSubmit(Request $request)
    {
        if($request->hasFile('images')) {
            $allowedfileExtension=['jpg','png'];
            $files = $request->file('images');
            $flag = true;
            foreach($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if(!$check) {
                    $flag = false;
                    break;
                }
            }
            if($flag) {
                $images= Image::create($request->all());
                foreach ($request->images as $image) {
                    $filename = $image->store('images');
                    House::create([
                        'house_id' => $images->id,
                        'filename' => $filename
                    ]);
                }
                echo "Đăng ảnh thành công";
            } else {
                echo "Đăng ảnh thất bại. (hãy thử với đuôi ảnh jpg, png!)";
            }
        }
    }
}
