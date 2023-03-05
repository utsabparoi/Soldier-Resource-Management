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
        // $data['camps'] = Camp::all();
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
        // ddd($request);
        $request->validate([
            'attachment' => 'file|mimes:jpg,jpeg,pdf,doc,docx',
        ]);

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
            $data['leave_application'] = LeaveApplication::find($id);
            $data['parades'] = ParadeModel::all();
            $data['leave_categories'] = LeaveCategory::all();
            // $data['camps'] = Camp::all();
            $data['store_men'] = StoreModel::all();
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
        $request->validate([
            'attachment' => 'file|mimes:jpg,jpeg,pdf,doc,docx|max:2048',
        ]);

        try {
            $this->storeOrUpdate($request, $id);

            return redirect()->route('prm.leave-applications.index')->with('success','Application Updated Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        try {
            $leave_aplication = LeaveApplication::find($id);
            $leave_aplication->delete();

            return redirect()->back()->with('success','Application Deleted Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /*
     |--------------------------------------------------------------------------
     | STORE/UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function storeOrUpdate($request, $id = null)
    {

        try {
            $leave_aplication= LeaveApplication::updateOrCreate([
                'id'                    =>$id,
            ],[
                'parade_id'             =>$request->parade_id,
                'leave_category_id'     =>$request->leave_category_id,
                'start_date'            =>$request->start_date,
                'end_date'              =>$request->end_date,
                'emergency_contact'     =>$request->emergency_contact,
                'reason'                =>$request->reason,
                'status'                =>$request->status ? 1: 0,
            ]);

            $this->upload_file($request->attachment, $leave_aplication, 'attachment', 'attachments/LeaveApplication');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
