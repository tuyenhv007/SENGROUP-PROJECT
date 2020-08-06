<?php

namespace App\Http\Controllers;


use App\Http\Requests\RequestResetPassword;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('forgot-password.check-email');
    }

    public function sendCodeResetPassword(Request $request)
    {
        $email = $request->email;

        $checkUser = User::where('email', $email)->first();
        if (!$checkUser) {
            alert()->error('Có lỗi xảy ra!', 'Không đúng email bạn đã dăng ký!');
            return redirect()->back();
        }

        $code = bcrypt(md5(time(), $email));

        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();
        alert()->success('Thành công', 'Link lấy lại mật khẩu đã được gửi vào email của bạn!');

        $url = route('reset.password', ['code' => $checkUser->code, 'email' => $email]);
        $data = [
            'route' => $url
        ];

        Mail::send('forgot-password.mail-reset-pass', $data, function ($message) use ($email) {
            $message->from('hoangtuyen9x@gmail.com', 'sengroup.com');
            $message->to($email, 'Visitor')->subject('Lấy lại mật khẩu ');
        });
        return redirect()->back();
    }

    public function resetPassword(Request $request)
    {
        $code = $request->code;
        $email = $request->email;

        $checkUser = User::where([
            'code' => $code,
            'email' => $email
        ]);
        if (!$checkUser) {
            alert()->error('Có lỗi xảy ra!', 'Đường dẫn lấy lại mật khẩu không hợp lệ, vui lòng thử lại sau!!');
            return redirect('forgot-password.check-email');
        }

        return view('forgot-password.reset-password');
    }

    public function saveResetPassword(RequestResetPassword $requestResetPassword)
    {
        if ($requestResetPassword->password) {

            $code = $requestResetPassword->code;
            $email = $requestResetPassword->email;

            $checkUser = User::where([
                'code' => $code,
                'email' => $email
            ])->first();

            if (!$checkUser) {
                alert()->error('Có lỗi xảy ra!', 'Đường dẫn lấy lại mật khẩu không hợp lệ, vui lòng thử lại sau!!');
                return redirect('forgot-password.check-email');
            }

            $checkUser->password = md5($requestResetPassword->password);
            $checkUser->save();

            alert()->success('Thành công', 'Mật khẩu đã được đổi thành công, mời bạn đăng nhập');
            return redirect()->route('login');
        }
    }


}
