<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Session; // Sử dụng session để lưu số lần đăng nhập sai

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
        // Kiểm tra số lần đăng nhập sai từ session
        $attempts = session()->get('login_attempts', 0);
        
        // Xác thực dữ liệu đầu vào
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Kiểm tra nếu email đúng hay không
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Bạn đã nhập sai email.']);
        }

        // Kiểm tra đăng nhập và xác thực
        if (Auth::attempt($credentials)) {
            // Nếu đăng nhập thành công, reset lại số lần đăng nhập sai
            session()->forget('login_attempts');
            
            // Sau khi đăng nhập thành công, kiểm tra vai trò
            $user = Auth::user();
            
            // Kiểm tra vai trò của người dùng và chuyển hướng tương ứng
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công!');
            } elseif ($user->role == 'user') {
                return redirect('/')->with('success', 'Đăng nhập thành công!');
            }
        }

        // Nếu mật khẩu sai, trả về thông báo
        $attempts++;
        session()->put('login_attempts', $attempts);

        // Nếu đã thử quá 3 lần, yêu cầu đổi mật khẩu
        if ($attempts >= 3) {
            return back()->withErrors(['email' => 'Bạn đã nhập sai quá 3 lần, vui lòng truy cập vào trang quên mật khẩu để thay đổi mật khẩu.'])->with('reset_password_prompt', true);
        }

        // Nếu không thành công, trả về thông báo mật khẩu sai
        return back()->withErrors(['password' => 'Bạn đã nhập sai mật khẩu.']);
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('login_attempts'); // Xóa session khi đăng xuất
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
