<?php

namespace App\Http\Controllers;

use App\Models\User;
use Module\PRM\Models\Camp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Module\PRM\Models\ParadeModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Module\PRM\Models\ParadeStateModel;
use Module\PRM\Models\ParadeCampMigration;
use Module\PRM\Models\ParadeCurrentProfileModel;

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

    /*=======================================================
        This Section start for dashboard controller purpose
    =========================================================*/
    public function state_info(){
        try {
            $data['parade'] = ParadeModel::with('camp')->paginate(30);
            $data['camp_name'] = Camp::all();
            $data['all_parade'] = ParadeModel::all();
            $data['all_states'] = ParadeStateModel::all();
            $data['table'] = ParadeModel::getTableName();
            //get soldier migrate camp name on today's date
            $current_location = ParadeCurrentProfileModel::with('camp')->latest()->first();
            $migrate_date = ParadeCampMigration::whereDate('migration_date','=',Carbon::today()->format("Y-m-d") )->get();
            if ((!$migrate_date->isEmpty()) && $current_location) {
                $data['location'] = $current_location;
            } else {
                $base_profile_data = ParadeModel::with('camp')->first();
                $data['location'] = $base_profile_data;
            }

            return view('pages.parade.index', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

}
