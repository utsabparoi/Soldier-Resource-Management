<?php

namespace Module\PRM\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Module\PRM\Models\StoreModel;
use Illuminate\Support\Facades\DB;
use Module\PRM\Models\ParadeModel;
use App\Http\Controllers\Controller;
use Module\PRM\Models\LeaveCategory;
use Module\PRM\Models\LeaveApplication;
use Module\PRM\Models\ParadeCurrentProfileModel;

class LeaveApplicationController extends Controller
{
    use FileSaver;

    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct()
    {
        //
    }

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
        $start_dates = DB::table('leave_applications')->where('parade_id', $request->parade_id)->pluck('start_date');
        $end_dates = DB::table('leave_applications')->where('parade_id', $request->parade_id)->pluck('end_date');
        ddd($start_dates, $end_dates);
        $startDate = Carbon::createFromFormat('Y-m-d', $start_dates);
        $endDate = Carbon::createFromFormat('Y-m-d', $end_dates);

        $dateRange = CarbonPeriod::create($startDate, $endDate);
        $dates = array_map(fn ($date) => $date->format('Y-m-d'), iterator_to_array($dateRange));

        $this->validate($request, [
            'parade_id'       => 'unique_with:$dates, camp_id, migration_date',
        ]);

        $request->validate([
            'start_date' => 'required|date_format:Y-m-d|before_or_equal:end_date',
            'end_date'   => 'required|date_format:Y-m-d|after_or_equal:start_date',
            'attachment' => 'file|mimes:jpg,jpeg,pdf,doc or docx',
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
            'start_date' => 'required|date_format:Y-m-d|before_or_equal:end_date',
            'end_date'   => 'required|date_format:Y-m-d|after_or_equal:start_date',
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

            $current_profile_data = ParadeCurrentProfileModel::updateOrCreate([
                'id'           =>$id,
            ],[
                'parade_id'             =>$request->parade_id,
                'leave_application_id'  =>$leave_aplication->id,
                'status'                =>$request->status ? 1: 0,
            ]);

            $this->upload_file($request->attachment, $leave_aplication, 'attachment', 'attachments/LeaveApplication');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
