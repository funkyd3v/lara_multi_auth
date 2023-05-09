<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/admin_images/'),$filename);
            $data->photo = $filename;
            
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function passwordChange()
    {
        return view('admin.password_change');
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            $notification = array(
                'message' => 'Old password does not match!',
                'alert-type' => 'error',
            );

            return back()->with($notification);
        }

        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password has been changed!',
            'alert-type' => 'success',
        );

        return back()->with($notification);
    }
}
