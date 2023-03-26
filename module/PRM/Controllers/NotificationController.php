<?php

namespace Module\PRM\Controllers;

use App\Traits\FileSaver;
use Module\PRM\Models\Camp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Module\PRM\Models\ParadeModel;
use App\Http\Controllers\Controller;
use Module\PRM\Models\LeaveCategory;
use Module\PRM\Models\LeaveApplication;
use Module\PRM\Models\ParadeStateModel;
use Module\PRM\Models\ParadeCampMigration;
use Module\PRM\Models\ParadeCurrentProfileModel;

class NotificationController extends Controller
{
    use FileSaver;


    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function soldier_leave(){

        try {

            $check_leave = LeaveApplication::whereBetween('end_date',[Carbon::now()->subMonth(3), Carbon::now()])->pluck('parade_id');
            $data['parades'] = ParadeModel::whereNotIn('id', $check_leave)->with('camp','leave_application')->paginate(30);

            // $data['last_leave'] = ParadeCurrentProfileModel::whereIn('parade_id', $check_leave)->pluck('leave_application_id');
            // ddd($data['last_leave']);

            $data['table'] = ParadeModel::getTableName();

            return view('pages.notification.leave-only-for-3-months', $data);

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function soldier_leave_assign($id){
        $data['check_parade'] = ParadeModel::find($id);
        $data['leave_categories'] = LeaveCategory::all();

        return view('pages.leave-application.create', $data);
    }



    public function soldier_in_camp(){

        // $parades = ParadeModel::query()
        //             ->where('enrolment_date', '<', Carbon::now()->subDays(30))
        //             ->whereHas('paradeCampMigrations', fn ($q) => $q->where('migration_date', '<', Carbon::now()->subDays(30)))
        //             ->get();

        try {
            $parade_in_camp = ParadeModel::whereBetween('enrolment_date', [Carbon::now()->subDays(30), Carbon::now()])->pluck('id');
            $migrate_in_camp = ParadeCampMigration::whereBetween('migration_date', [Carbon::now()->subDays(30), Carbon::now()])->pluck('parade_id');
            $data['parades'] = ParadeModel::whereNotIn('id', $migrate_in_camp)->whereNotIn('id', $parade_in_camp)->paginate(30);

            $data['table'] = ParadeModel::getTableName();

            return view('pages.notification.soldier-state-in-a-same-camp-more-than-30-days', $data);

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function soldier_camp_assign($id){
        $data['checkParade'] = ParadeModel::find($id);
        $data['camps'] = Camp::all();

        return view('pages.parade-migrate.manualCampMigrate', $data);
    }
}
