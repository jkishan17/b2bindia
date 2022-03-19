<?php

namespace App\Http\Controllers\Jpanel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('jpanel.profile');
    }
    public function profileUpdate(Request $request)
    {
        $user_id = Auth::getUser()->id;
        $request->validate([
            'uname' => 'required',
            'username' => 'required|unique:users,username,'.$user_id,
            'phone' => 'required|unique:users,phone,'.$user_id,
            'email' => 'required|email|unique:users,email,'.$user_id,
        ]);
        
        $user = User::where('id', $user_id)->update(['name' => $request->uname, 'username' => $request->username, 'phone' => $request->phone, 'email' => $request->email]);
        if ($user) {
            return redirect('jpanel/profile')->with('success', 'Your profile has been changed!');
        } else {
            return redirect('jpanel/profile')->with('error', 'Something went wrong. Try again.');
        }
    }
    public function passwordUpdate(Request $request)
    {
        $user_id = Auth::getUser()->id;
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        
        $user = User::where('id', $user_id)->update(['password' =>  Hash::make($request->password)]);
        if ($user) {
            return redirect('jpanel/profile')->with('success', 'Your password has been changed!');
        } else {
            return redirect('jpanel/profile')->with('error', 'Something went wrong. Try again.');
        }
    }
    public function profileImageUpdate(Request $request)
    {
        $user_id = Auth::getUser()->id;
        
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->avatar->extension();
        $request->avatar->storeAs('public/images/userProfile', $imageName);
        $user = User::where('id', $user_id)->update(['avatar' => $imageName]);
        if ($user) {
            return redirect('jpanel/profile')->with('success', 'Your profile image has been changed!');
        } else {
            return redirect('jpanel/profile')->with('error', 'Something went wrong. Try again.');
        }
    }
}
