<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $rules = [
            'current_password' => 'password',
            'new_password' => ['required', 'min:8', 'confirmed'],
        ];
        $validatedData = $request->validate($rules);
        $user = auth()->user();
        $user->password = bcrypt($validatedData['new_password']);
        $user->save();
        session()->flash('success', 'Password Changed Successfully');
        return redirect()->route('dashboard.home');
    }
}
