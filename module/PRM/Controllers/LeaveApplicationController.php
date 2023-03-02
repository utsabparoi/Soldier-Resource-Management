<?php

namespace Module\PRM\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\FileSaver;
use Module\PRM\Models\Camp;
use Module\PRM\Models\LeaveApplication;
use Module\PRM\Models\LeaveCategory;
use Module\PRM\Models\ParadeModel;
use Module\PRM\Models\StoreModel;

class LeaveApplicationController extends Controller
{
    use FileSaver;
    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $data['leave_applications']  = LeaveApplication::paginate(20);
            $data['table']  = LeaveApplication::getTableName();
            return view('pages.leave-application.index', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data['parades'] = ParadeModel::all();
        $data['leave_categories'] = LeaveCategory::all();
        $data['camps'] = Camp::all();
        $data['store_men'] = StoreModel::all();
        return view('pages.leave-application.create', $data);
    }

    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        try {
            $this->storeOrUpdate($request);

            return redirect()->route('prm.leave-applications.index')->with('success','Leave Application Created Successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        try {
            $data['leave_applications'] = LeaveApplication::find($id);
            return view('pages.leave-application.edit', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        # code...
    }

    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        # code...
    }
}
