<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ========== ADMIN ==========

    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,user',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gender' => 'required|string|in:male,female,other',
            'address' => 'nullable|string|max:255',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarName = uniqid() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('images'), $avatarName);
            $avatarPath = $avatarName;
        }

        User::create([
            'name' => $request->name,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'avatar' => $avatarPath,
            'gender' => $request->gender,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được thêm!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Xóa avatar nếu có
        if ($user->avatar && file_exists(public_path('images/' . $user->avatar))) {
            unlink(public_path('images/' . $user->avatar));
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được xóa!');
    }

    // ========== USER ==========

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    // Cập nhật thông tin người dùng đang đăng nhập (user)
    public function updateProfile(Request $request)
{
    $user = Auth::user(); // Lấy người dùng hiện tại

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gender' => 'required|string|in:male,female,other',
        'address' => 'nullable|string|max:255',
        'password' => 'nullable|string|min:8|confirmed', // Xác nhận mật khẩu mới
    ]);

    // Xử lý avatar
    $avatarPath = $user->avatar;
    if ($request->hasFile('avatar')) {
        if ($avatarPath && file_exists(public_path('images/' . $avatarPath))) {
            unlink(public_path('images/' . $avatarPath));
        }
        $avatarPath = uniqid() . '.' . $request->file('avatar')->getClientOriginalExtension();
        $request->file('avatar')->move(public_path('images'), $avatarPath);
    }

    // Cập nhật mật khẩu nếu có thay đổi
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    // Cập nhật thông tin người dùng
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'gender' => $request->gender,
        'address' => $request->address,
        'avatar' => $avatarPath,
    ]);

    return redirect()->route('profile')->with('success', 'Cập nhật thông tin thành công!');
}


    // Cập nhật thông tin người dùng (admin chỉnh sửa)
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|string|in:admin,user',
            'gender' => 'required|string|in:male,female,other',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:8|confirmed', // Đảm bảo mật khẩu mới phải xác nhận
        ]);
    
        // Xử lý avatar
        $avatarPath = $user->avatar;
        if ($request->hasFile('avatar')) {
            if ($avatarPath && file_exists(public_path('images/' . $avatarPath))) {
                unlink(public_path('images/' . $avatarPath));
            }
            $avatarPath = uniqid() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('images'), $avatarPath);
        }
    
        // Nếu có mật khẩu mới, hash mật khẩu trước khi lưu
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        // Cập nhật thông tin người dùng
        $user->update([
            'name' => $request->name,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'role' => $request->role,
            'gender' => $request->gender,
            'address' => $request->address,
            'avatar' => $avatarPath,
        ]);
    
        return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được cập nhật!');
    }
    
    // Hiển thị form chỉnh sửa người dùng trong admin
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    
}
