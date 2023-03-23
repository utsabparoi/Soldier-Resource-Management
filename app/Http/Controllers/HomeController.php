<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/');
    }

    public function user_index()
    {
        return view('backend.page.user_profile.user_info',[
            'allUserInfo'=> User::find(auth()->id()),
        ]);
    }

    /*
     |--------------------------------------------------------------------------
     | Update METHOD for user information update
     |--------------------------------------------------------------------------
    */
    function admin_update(Request $request){
        $id = Auth::id();

        if (isset($request->password)) {
            if (Hash::check($request->old_password, Auth::user()->password)) {
                $request->validate([
                    'password'=>'required | min:8',
                    'password_confirmation'=>'required',
                ]);
                if ($request->password == $request->password_confirmation){
                    User::find($id)->update([
                        'password' => bcrypt($request->password),
                    ]);
                    return back()->with('success',"Password Changed Successfully");
                }
                else {
                    return back()->with('error',"New password & Confirm Password doesn't matched");
                }
            }
            else {
                return back()->with('error',"Old password doesn't matched");
            }
        }
        User::find($id)->update([
            'name'=> $request->name,
        ]);
        return back();
    }
}
