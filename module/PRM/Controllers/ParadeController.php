<?php

namespace Module\PRM\Controllers;

use App\Traits\AutoCreatedUpdated;
use App\Traits\FileSaver;
use Barryvdh\DomPDF\Facade\Pdf;
use Module\PRM\Models\Camp;
use Illuminate\Http\Request;
use Module\PRM\Models\Course;
use Illuminate\Support\Carbon;
use Module\PRM\Models\APRModel;
use Module\PRM\Models\ParadeStateModel;
use Module\PRM\Models\Training;
use Module\PRM\Models\ParadeModel;
use App\Http\Controllers\Controller;
use Module\PRM\Models\LeaveApplication;
use Module\PRM\Models\ParadeCampMigration;
use Module\PRM\Models\ParadeCourseModel;
use Module\PRM\Models\ParadeTrainingModel;
use Module\PRM\Models\ParadeCurrentProfileModel;
use Maatwebsite\Excel\Excel;
use App\Exports\ParadeExport;


class ParadeController extends Controller
{
    private $excel;
    private $service;
    use FileSaver;


    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $data['parade'] = ParadeModel::with('camp')->paginate(30);
            $data['camp_name'] = Camp::all();
            $data['all_parade'] = ParadeModel::all();
            $data['all_states'] = ParadeStateModel::all();
            //get soldier migrate camp name on today's date
            $current_location = ParadeCurrentProfileModel::with('camp')->latest()->first();

            $migrate_date = ParadeCampMigration::whereDate('migration_date','=',Carbon::today()->format("Y-m-d") )->get();

            if ((!$migrate_date->isEmpty()) && $current_location) {
                $data['location'] = $current_location;
            } else {
                $base_profile_data = ParadeModel::with('camp')->first();
                $data['location'] = $base_profile_data;
            }

            $data['table'] = ParadeModel::getTableName();
            return view('pages.parade.index', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function getParadeSearch(Request $request)
    {
        $campName = $request->input('CampName');
        $rank = $request->input('Rank');
        $last_leave_duration = $request->input('LastLeave');

        if (isset($campName) && isset($rank)) {

            $searchedParades = ParadeModel::where('present_location', '=', $campName)->where('next_rank', '=', $rank)->with('camp')->with('state')->get();
        } elseif (isset($campName)) {

            $searchedParades = ParadeModel::where('present_location', '=', $campName)->with('camp')->with('state')->get();
        } elseif (isset($rank)) {

            $searchedParades = ParadeModel::where('next_rank', '=', $rank)->with('camp')->with('state')->get();
        } elseif (isset($campName) && isset($last_leave_duration)) {

            if($last_leave_duration == 3){

                $last_leave = LeaveApplication::whereBetween('end_date',[Carbon::now()->subMonth(3), Carbon::now()])->pluck('parade_id');

                $searchedParades = ParadeModel::whereIn('id', $last_leave)->where('present_location', '=', $campName)->with('camp','state')->get();
                // $searchedParades = $parade_info;
            }elseif($last_leave_duration == 2){

                $last_leave = LeaveApplication::whereBetween('end_date',[Carbon::now()->subMonth(2), Carbon::now()])->pluck('parade_id');

                $searchedParades = ParadeModel::whereIn('id', $last_leave)->where('present_location', '=', $campName)->with('camp','state')->get();
                // $searchedParades = $parade_info;
            }
        }elseif (isset($last_leave_duration)) {

            if($last_leave_duration == 3){

                $last_leave = LeaveApplication::whereBetween('end_date',[Carbon::now()->subMonth(3), Carbon::now()])->pluck('parade_id');

                $searchedParades = ParadeModel::whereIn('id', $last_leave)->with('camp','state')->get();
                // $searchedParades = $parade_info;
            }elseif($last_leave_duration == 2){

                $last_leave = LeaveApplication::whereBetween('end_date',[Carbon::now()->subMonth(2), Carbon::now()])->pluck('parade_id');

                $searchedParades = ParadeModel::whereIn('id', $last_leave)->with('camp','state')->get();
                // $searchedParades = $parade_info;
            }
        }
        return response()->json($searchedParades);
    }


    public function paradeProfile($id)
    {
        $data['parade'] = ParadeModel::find($id);
        $data['courses'] = ParadeCourseModel::where('parade_id', '=', $id)->with('course')->get();
        $data['trainings'] = ParadeTrainingModel::where('parade_id', '=', $id)->get();
        $data['aprs'] = APRModel::where('parade_id', '=', $id)->get();
        $data['lastLeave'] = LeaveApplication::where('parade_id', '=', $id)->orderBy('end_date', 'desc')->first();

        $current_location = ParadeCurrentProfileModel::where('parade_id', $id)
            ->with('camp')->latest()->first();

        $migrate_date = ParadeCampMigration::whereDate('migration_date','=',Carbon::today()->format("Y-m-d") )->where('parade_id', $id)->get();

        if ((!$migrate_date->isEmpty()) && $current_location) {
            $data['location'] = $current_location;
        } else {
            $base_profile_data = ParadeModel::where('id', $id)->with('camp')->first();
            $data['location'] = $base_profile_data;
        }

        return view('pages.parade.paradeProfile', $data);
    }


    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $camp = Camp::all();
        return view('pages.parade.create', compact('camp'));
    }


    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        //click proceed to next button work
        if ($request->submitButton == 'proceedToNext') {
            $profileData = array(
                'Name' => $request->name,
                'PresentLocation' => $request->presentLocation,
                'DateOfJoin' => $request->dateOfJoin,
                'Image' => $request->image,
                'DateOfEnrolment' => $request->dateOfEnrolment,
                'DateOfPresentRank' => $request->dateOfPresentRank,
                'DateOfRetirement' => $request->dateOfRetirement,
                'CidEdn' => $request->cidEdn,
                'MedCat' => $request->medCat,
                'QualUnqualRank' => $request->qualUnqualRank,
                'PermanentAddress' => $request->permanentAddress,
                'MeritalStatus' => $request->meritalStatus,
                'NoOfChildren' => $request->noOfChildren,
            );

            if (isset($profileData['Image'])) {
                $new_file_name = time() . '.' . $profileData['Image']->getClientOriginalExtension();
                $month = Carbon::now()->format('M');
                $directory = './assets/' . 'images/paradeProfile' . '/' . date('Y') . '/' . $month . '/';
                $profileData['Image']->move($directory, $new_file_name);
                session()->put("profileImage", $directory . $new_file_name);
            }
            $data['courses'] = Course::all();
            $data['training'] = Training::all();
            return view('pages.parade.addExtraInformation', compact('profileData'), $data);
        } //click save button work
        else if ($request->submitButton == 'save') {
            try {
                $existImage = session('profileImage');
                if (isset($existImage)) {
                    unlink($existImage);
                    session()->forget('profileImage');
                }
                $this->storeOrUpdate($request);
                return redirect()->route('prm.parade.index')->with('success', 'Soldier Created Successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
        } //click save with extra info work
        else if ($request->submitButton == 'saveWithExtraInfo') {
            try {
                $this->storeOrUpdateWithExtraInfo($request);
                return redirect()->route('prm.parade.index')->with('success', 'Soldier Created Successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
        }
    }


    public function imageUnlink()
    {
        $existImage = session('profileImage');
        if (isset($existImage)) {
            unlink($existImage);
            session()->forget('profileImage');
        }
        return 1;
    }


    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        # code...
    }


    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        try {
            $data['parade'] = ParadeModel::find($id);
            $data['ranks'] = ParadeModel::find($id)->get('next_rank');
            return view('pages.parade.edit', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        try {
            $this->storeOrUpdate($request, $id);
            return redirect()->route('prm.parade.index')->with('success', 'Soldier Updated Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
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
            $store = ParadeModel::find($id);
            $store->delete();
            return redirect()->back()->with('success', 'Soldier Deleted Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function storeOrUpdate($request, $id = null)
    {
        try {
            $parade = ParadeModel::updateOrCreate(
                [
                    'id' => $id,
                ],
                [
                    'name' => $request->name,
                    'present_location' => $request->presentLocation,
                    'join_date_present_unit' => $request->dateOfJoin,
                    'enrolment_date' => $request->dateOfEnrolment,
                    'present_rank_date' => $request->dateOfPresentRank,
                    'retirement_date' => $request->dateOfRetirement,
                    'civ_edn' => $request->cidEdn,
                    'med_cat' => $request->medCat,
                    'next_rank' => $request->qualUnqualRank,
                    'permanent_address' => $request->permanentAddress,
                    'marital_status' => $request->meritalStatus,
                    'children_number' => $request->noOfChildren,
                    'state_id' => 1,
                    'status' => 1,
                    'created_by' => auth()->id(),
                    'updated_by' => auth()->id(),
                ]
            );
            $this->upload_file($request->image, $parade, 'image', 'images/paradeProfile');

            return $parade;
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function storeOrUpdateWithExtraInfo($request, $id = null)
    {
        try {
            $getProfileImage = session('profileImage');
            if (isset($getProfileImage)) {
                $Image = $getProfileImage;
            } else {
                $Image = "backend/images/person.png";
            }
            $parade = ParadeModel::updateOrCreate(
                [
                    'id' => $id,
                ],
                [
                    'name' => $request->name,
                    'present_location' => $request->presentLocation,
                    'join_date_present_unit' => $request->dateOfJoin,
                    'image' => $Image,
                    'enrolment_date' => $request->dateOfEnrolment,
                    'present_rank_date' => $request->dateOfPresentRank,
                    'retirement_date' => $request->dateOfRetirement,
                    'civ_edn' => $request->cidEdn,
                    'med_cat' => $request->medCat,
                    'next_rank' => $request->qualUnqualRank,
                    'permanent_address' => $request->permanentAddress,
                    'marital_status' => $request->meritalStatus,
                    'children_number' => $request->noOfChildren,
                    'state_id' => 1,
                    'status' => 1,
                    'created_by' => auth()->id(),
                    'updated_by' => auth()->id(),
                ]
            );

            //course add
            if ($request->course[0] == "notSelect") {
            } else {
                foreach ($request->course as $key => $value) {
                    $paradeCourse = ParadeCourseModel::updateOrCreate(
                        [
                            'id' => $id,
                        ],
                        [
                            'course_id' => Course::where('name', '=', $request->course[$key])->first()->id,
                            'parade_id' => $parade->id,
                            'remark' => $request->course_remark[$key],
                            'duration' => $request->course_duration[$key],
                            'result' => $request->course_result[$key],
                            'status' => 1,
                            'created_by' => auth()->id(),
                            'updated_by' => auth()->id(),
                        ]
                    );
                }
            }

            //training add
            if ($request->training[0] == "notSelect") {
            } else {
                foreach ($request->training as $key => $value) {
                    $paradeTraining = ParadeTrainingModel::updateOrCreate(
                        [
                            'id' => $id,
                        ],
                        [
                            'training_id' => Training::where('name', '=', $request->training[$key])->first()->id,
                            'parade_id' => $parade->id,
                            'remark' => $request->training_remark[$key],
                            'duration' => $request->training_duration[$key],
                            'result' => $request->training_result[$key],
                            'status' => 1,
                            'created_by' => auth()->id(),
                            'updated_by' => auth()->id(),
                        ]
                    );
                }
            }

            session()->forget('profileImage');
            return $parade;
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    public function exportExcelCSV(Excel $excel){
        return $excel->download(new ParadeExport , 'Parades.csv');
    }

    public function exportPDF()
    {
        $parade = ParadeModel::all();
        $pdf = PDF::loadView('pages.pdf-pattern.parade_pdf', array('parade' =>  $parade))
            ->setPaper('a4', 'portrait');
        return $pdf->download('parades.pdf');
    }

    public function paradeHistory($id){
        $history = ParadeCurrentProfileModel::where('parade_id', '=', $id)->get();
        $parade = ParadeModel::find($id);
        return view('pages.parade.paradeHistory', compact('history', 'parade'));
    }

    public function stateChange(Request $request){
        $parade_id = $request->input("Parade");
        $state_id = $request->input("State");
        ParadeModel::where("id", "=", $parade_id)->update(["state_id" => $state_id]);
        return 1;
    }
}
