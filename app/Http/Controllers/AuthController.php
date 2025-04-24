<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegisterForm()
    { 
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',  // Thêm validate cho full_name
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|required_with:password_confirmation|confirmed',
        ]);

        // Tạo người dùng mới
        User::create([
            'name' => $request->name,
            'full_name' => $request->full_name,  // Lưu thông tin full_name vào CSDL
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        // Kiểm tra đăng nhập và xác thực
        if (Auth::attempt($credentials)) {
            // Sau khi đăng nhập thành công, kiểm tra vai trò
            $user = Auth::user();
            
            // Kiểm tra vai trò của người dùng và chuyển hướng tương ứng
            if ($user->role == 'admin') {
                // Nếu là admin, chuyển hướng đến trang quản lý admin
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công!');
            } elseif ($user->role == 'user') {
                // Nếu là user, chuyển hướng về trang chủ
                return redirect('/')->with('success', 'Đăng nhập thành công!');
            }
        }
        
        // Nếu không thành công, trả về thông báo lỗi
        return back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Đăng xuất thành công!');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        Password::sendResetLink($request->only('email'));
        return back()->with('status', 'Liên kết đặt lại mật khẩu đã được gửi!');
    }
}
