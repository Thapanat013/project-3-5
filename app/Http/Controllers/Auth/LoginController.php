<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // แสดงฟอร์ม login
    public function showLoginForm()
    {
        return view('auth.login'); // หรือที่ตั้งของไฟล์ฟอร์ม login
    }

    // ทำการ login
    public function login(Request $request)
    {
        // กำหนดกฎการตรวจสอบข้อมูล
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // ตรวจสอบข้อมูลผู้ใช้
        $credentials = $request->only('email', 'password');

        // ลองเข้าสู่ระบบ
        if (Auth::attempt($credentials)) {
            // หาก login สำเร็จ ให้ redirect ไปที่หน้า dashboard หรือหน้าหลัก
            return redirect()->intended(route('admin.index'));  // ถ้าใช้หน้าหลักของ admin
        }

        // หาก login ล้มเหลว
        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    // ทำการ logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
