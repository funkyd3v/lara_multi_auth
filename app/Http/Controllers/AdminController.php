<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('admin.profile', compact('userData'));
    }
}
