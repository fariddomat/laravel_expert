<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function edit()
    {
        return view('dashboard.password.edit');
    }

    public function update(Request $request)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = auth()->user();

        // التحقق من كلمة المرور الحالية
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة.']);
        }

        // تحديث كلمة المرور
        $user->password = Hash::make($request->new_password);
        $user->save();

        session()->flash('success', 'تم تغيير كلمة المرور بنجاح');
        return redirect()->route('dashboard.home');
    }
}
