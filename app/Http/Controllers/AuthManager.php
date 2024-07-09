<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('Auth.login');
    }
    function registration()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('Auth.registration');
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('phone', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route(name: 'home'));
        }
        return redirect(route('login'))->with("error", "Đăng nhập thất bại. Số điện thoại hoặc mật khẩu sai");
        // dd($request->all());
    }
    function registrationPost(Request $request)
    {
        $request->validate(
            [
                'name' => "required|max:50",
                'phone' => "required|unique:users|digits:10",
                'email' => "required|email|unique:users",
                'password' => "required|min:8|confirmed",
            ],
            [
                'phone.digits'=>"Số điện thoại phải bao gồm 10 số",
                'password.required' => 'Vui lòng nhập mật khẩu.',
                // 'password.string' => 'Mật khẩu phải là chuỗi.',
                'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
                'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            ]
        );

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if (!$user) {
            return redirect(route('registration'))->with("error", "Đăng kí thất bại, vui lòng thử lại");
        }
        ;
        return redirect(route('login'))->with("success", "Đăng kí thành công, đăng nhập để try cập vào ứng dụng");
    }
    function profile()
    {
        return view('Auth.profile');
    }
    function edit()
    {
        return view('Auth.editProfile');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'occupation' => 'required',
            'birthday' => 'required|date',
            'jplanguageproficiency' => 'required',
        ]);
    
        // Lấy id của người dùng cần cập nhật từ session hoặc từ request (tuỳ vào cách bạn thiết kế logic)
        $userId = auth()->user()->id; // Ví dụ lấy id của người dùng đã đăng nhập
    
        // Lấy thông tin người dùng cần cập nhật từ request
        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'occupation' => $request->occupation,
            'birthday' => $request->birthday,
            'jplanguageproficiency' => $request->jplanguageproficiency,
        ];
    
        // Cập nhật thông tin người dùng trong cơ sở dữ liệu
        $user = User::where('id', $userId)->update($data);
    
        if (!$user) {
            return redirect()->route('editProfile')->with("error", "Cập Nhật thất bại, vui lòng thử lại");
        }
    
        return redirect()->route('profile')->with("success", "Cập Nhật thành công");
    }

    function showChangePasswordForm()
    {
        return view('Auth.changePassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Kiểm tra mật khẩu hiện tại có đúng không
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.'])->withInput();
        }

        // Cập nhật mật khẩu mới cho người dùng
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home')->with('success', 'Đổi mật khẩu thành công.');
    }


    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('home'));

    }
}
