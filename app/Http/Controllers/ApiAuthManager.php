<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthManager extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => "required|max:50",
                'phone' => "required|unique:users|digits:10",
                'email' => "required|email|unique:users|max:50",
                'password' => "required|min:8|confirmed",
            ], [
                'password.required' => 'Vui lòng nhập mật khẩu.',
                'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
                'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            } else {
                $data['name'] = $request->name;
                $data['phone'] = $request->phone;
                $data['email'] = $request->email;
                $data['password'] = Hash::make($request->password);

                $user = User::create($data);
            }
            if ($user) {
                return response()->json([
                    'status' => true,
                    'message' => 'tạo tài khoản thành công',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'tạo tài khoản thất bại'
                ], 500);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => 'tạo tài khoản thất bại'
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function login(Request $request)
    {
        try {
            $request->validate([
                'phone' => 'required',
                'password' => 'required',
            ]);
            $credentials = $request->only('phone', 'password');
            $user = User::where('phone', $request->phone)->first();
            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Đăng nhập thành công',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Số điện thoại & mật khẩu sai'
                ], 500);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'tạo tài khoản thất bại'
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function profile()
    {
        $userData = auth()->user();
        return response()->json([
            'status' => true,
            'message' => 'Thông tin cá nhân',
            'data' => $userData,
            'id' => auth()->user()->id
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => "Người dùng đăng xuất",
            'data'=>[],
        ],200);
    }
}
