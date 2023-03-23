<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function User()
    {
        $allUser = User::paginate(5);
        return view('backend.page.user.user', compact('allUser'));
    }

    function CreateUserForm()
    {
        return view('backend.page.user.createUser');
    }

    function CreateUser(Request $request)
    {
        $name = $request->input('Name');
        $email = $request->input('Email');
        $password = $request->input('Password');
        $hashPassword = Hash::make($password);

        $checkExistingEmail = User::where("email", "=", $email)->count();
        $checkExistingName = User::where("name", "=", $name)->count();
        if ($checkExistingEmail > 0) {
            return 1;
        } else if ($checkExistingName > 0) {
            return 2;
        } else {
            User::insertOrIgnore(
                [
                    ['name' => $name, 'email' => $email, 'password' => $hashPassword, 'created_at' => date('Y-m-d H:i:s'),]
                ]
            );
        }
    }

    function EditUserForm($id)
    {
        $user = User::where("id", "=", $id)->find($id);
        return view('backend.page.user.editUser', compact('user'));
    }

    function UserUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $name = $request->input('Name');
        $email = $request->input('Email');
        $password = $request->input('Password');
        $changePassword = $request->filled('Password') ? Hash::make($password) : $user->password;

        $checkExistingName = User::where("id", "!=", $user->id)->where("name", "=", $name)->count();
        $checkExistingEmail = User::where("id", "!=", $user->id)->where("email", "=", $email)->count();
        if ($checkExistingName > 0) {
            return 1;
        } else if ($checkExistingEmail > 0) {
            return 2;
        } else {
            $user->update(["name" => $name, "email" => $email, "password" => $changePassword]);
        }
    }

    function UserDelete($id)
    {
        User::where("id", "=", $id)->delete();
        return redirect(route("user"));
    }

}
