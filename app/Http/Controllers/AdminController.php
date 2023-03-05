<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function LoginForm(){
        return view('backend.page.user.login');
    }

    function User(){
        $allUser = AdminModel::paginate(5);
        return view('backend.page.user.user', compact('allUser'));
    }

    function Login(Request $request){
        $email = $request->input('Email');
        $password = $request->input('Password');
        $hashPassword = hash('md5', $password);

        $userEmail = AdminModel::where("email", "=", $email)->where("password", "=", $hashPassword)->count();

        $user = AdminModel::where("email", "=", $email)->first()->name;
        $id   = AdminModel::where("email", "=", $email)->first()->id;

        if($userEmail == 1){
            $request->session()->put("AdminLoginSession", $user);
            $request->session()->put("AdminId", $id);
            return 1;
        }
        else
        {
            return 0;
        }
    }

    function Logout(Request $request){
        $request->session()->flush();
        return redirect("/Login");
    }
}
