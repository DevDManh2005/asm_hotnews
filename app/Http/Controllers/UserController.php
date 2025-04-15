<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Ad;  // Import Ad model
class UserController extends Controller
{
    // Hiển thị danh sách người dùng
    public function index()
    {
        $users = User::paginate(10);  // Phân trang 10 người dùng mỗi trang
        return view('admin.users.index', compact('users'));
    }

    // Hiển thị form thêm người dùng
    public function create()
    {
        return view('admin.users.create');
    }

    // Lưu người dùng mới
   public function store(Request $request)
{
    // Xác thực dữ liệu từ form với thông báo lỗi tiếng Việt
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|string|in:admin,user', // Kiểm tra vai trò hợp lệ
    ], [
        'password.required' => 'Mật khẩu là bắt buộc.',
        'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
        'password.confirmed' => 'Mật khẩu và xác nhận mật khẩu không khớp.',
        'role.required' => 'Vai trò là bắt buộc.',
        'role.in' => 'Vai trò phải là "admin" hoặc "user".',
    ]);

    // Tạo người dùng mới
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Mã hóa mật khẩu
        'role' => $request->role,
    ]);

    // Chuyển hướng về trang danh sách người dùng với thông báo thành công
    return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được thêm!');
}

    // Hiển thị form chỉnh sửa người dùng
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Cập nhật thông tin người dùng
    public function update(Request $request, $id)
{
    // Kiểm tra dữ liệu gửi lên

    // Xác thực dữ liệu từ form với thông báo lỗi tiếng Việt
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id, // Kiểm tra email đã tồn tại chưa
        'password' => 'nullable|string|min:8|confirmed', // Mật khẩu là tùy chọn
        'role' => 'required|string|in:admin,user', // Kiểm tra vai trò hợp lệ
    ], [
        'password.required' => 'Mật khẩu là bắt buộc.',
        'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
        'password.confirmed' => 'Mật khẩu và xác nhận mật khẩu không khớp.',
        'role.required' => 'Vai trò là bắt buộc.',
        'role.in' => 'Vai trò phải là "admin" hoặc "user".',
    ]);

    // Kiểm tra mật khẩu
    if ($request->filled('password')) {
        if (strlen($request->password) < 8) {
            return back()->withErrors(['password' => 'Mật khẩu phải có ít nhất 8 ký tự.'])->withInput();
        }
    }

    // Tìm người dùng và cập nhật
    $user = User::findOrFail($id);

    // Cập nhật mật khẩu nếu có
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password); // Mã hóa mật khẩu mới
    }

    // Cập nhật thông tin người dùng
    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role;  // Cập nhật vai trò

    // Lưu lại dữ liệu vào cơ sở dữ liệu
    $user->save();

    // Quay lại trang danh sách người dùng với thông báo thành công
    return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được cập nhật!');
}

    
    
    // Xóa người dùng
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được xóa!');
    }

    // Hiển thị thông tin tài khoản người dùng đã đăng nhập
    public function profile()
    {   
        // Lấy tất cả quảng cáo
        $ads = Ad::all();

        $user = Auth::user();
        return view('user.profile', compact('user','ads'));
    }

    // Cập nhật thông tin người dùng
    public function updateProfile(Request $request)
    {
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại

        // Validate dữ liệu từ form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Cập nhật thông tin người dùng
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Nếu có mật khẩu mới, cập nhật mật khẩu
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        return redirect()->route('profile')->with('success', 'Thông tin tài khoản đã được cập nhật!');
    }
}