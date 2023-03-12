<?php

namespace Module\PRM\Controllers;

use App\Models\User;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Module\PRM\Models\Camp;
use Module\PRM\Models\Course;
use Module\PRM\Models\ParadeCourseModel;
use Module\PRM\Models\ParadeModel;
use Module\PRM\Models\ParadeTrainingModel;
use Module\PRM\Models\Training;

class ParadeController extends Controller
{
    private $service;
    use FileSaver;

    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct()
    {
        $this->middleware('AdminLogin');
    }

    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $data['parade'] = ParadeModel::paginate(30);
            $data['camp_name'] = Camp::all();
            $data['all_parade'] = ParadeModel::all();
            $data['table'] = ParadeModel::getTableName();
            return view('pages.parade.index', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function getParadeSearch(Request $request){
        $campId = $request->input('CampID');
        $rank = $request->input('Rank');
        if (isset($campId) && isset($rank)){
            $searchedParades = ParadeModel::where('present_location', '=', $campId)->where('next_rank', '=', $rank)->get();
        }
        elseif (isset($campId)){
            $searchedParades = ParadeModel::where('present_location', '=', $campId)->get();
        }
        elseif (isset($rank)){
            $searchedParades = ParadeModel::where('next_rank', '=', $rank)->get();
        }
        else{
            $searchedParades = '';
        }
        return response()->json($searchedParades);
    }


    public function paradeProfile($id)
    {
        $data['parade'] = ParadeModel::find($id);
        $data['courses'] = ParadeCourseModel::where('parade_id', '=', $id)->get();
        $data['trainings'] = ParadeTrainingModel::where('parade_id', '=', $id)->get();
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
                'Name'                  => $request->name,
                'PresentLocation'       => $request->presentLocation,
                'DateOfJoin'            => $request->dateOfJoin,
                'Image'                 => $request->image,
                'DateOfEnrolment'       => $request->dateOfEnrolment,
                'DateOfPresentRank'     => $request->dateOfPresentRank,
                'DateOfRetirement'      => $request->dateOfRetirement,
                'CidEdn'                => $request->cidEdn,
                'MedCat'                => $request->medCat,
                'QualUnqualRank'        => $request->qualUnqualRank,
                'PermanentAddress'      => $request->permanentAddress,
                'MeritalStatus'         => $request->meritalStatus,
                'NoOfChildren'          => $request->noOfChildren,
            );

            if (isset($profileData['Image'])) {
                $new_file_name   = time() . '.' . $profileData['Image']->getClientOriginalExtension();
                $month = Carbon::now()->format('M');
                $directory = './assets/' . 'images/paradeProfile' . '/' . date('Y') . '/' . $month . '/';
                $profileData['Image']->move($directory, $new_file_name);
                session()->put("profileImage", $directory . $new_file_name);
            }
            $data['courses'] = Course::all();
            $data['training'] = Training::all();
            return view('pages.parade.addExtraInformation', compact('profileData'), $data);
        }
        //click save button work
        else if ($request->submitButton == 'save') {
            try {
                $existImage = session('profileImage');
                if (isset($existImage)) {
                    unlink($existImage);
                    session()->forget('profileImage');
                }
                $this->storeOrUpdate($request);
                return redirect()->route('prm.parade.index')->with('success', 'Parade Created Successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
        }
        //click save with extra info work
        else if ($request->submitButton == 'saveWithExtraInfo') {
            try {
                $this->storeOrUpdateWithExtraInfo($request);
                return redirect()->route('prm.parade.index')->with('success', 'Parade Created Successfully');
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
            return redirect()->route('prm.parade.index')->with('success', 'Parade Updated Success');
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
            return redirect()->back()->with('success', 'Parade Deleted Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function storeOrUpdate($request, $id = null)
    {
        try {
            if (isset($request->image)) {
                $parade = ParadeModel::updateOrCreate(
                    [
                        'id'                        => $id,
                    ],
                    [
                        'name'                      => $request->name,
                        'present_location'          => $request->presentLocation,
                        'join_date_present_unit'    => $request->dateOfJoin,
                        'enrolment_date'            => $request->dateOfEnrolment,
                        'present_rank_date'         => $request->dateOfPresentRank,
                        'retirement_date'           => $request->dateOfRetirement,
                        'civ_edn'                   => $request->cidEdn,
                        'med_cat'                   => $request->medCat,
                        'next_rank'                 => $request->qualUnqualRank,
                        'permanent_address'         => $request->permanentAddress,
                        'marital_status'            => $request->meritalStatus,
                        'children_number'           => $request->noOfChildren,
                        'status'                    => 1,
                        'created_by'                => session('AdminId'),
                        'updated_by'                => session('AdminId'),
                    ]
                );
                $this->upload_file($request->image, $parade, 'image', 'images/paradeProfile');
            } else {
                $parade = ParadeModel::updateOrCreate(
                    [
                        'id'                        => $id,
                    ],
                    [
                        'name'                      => $request->name,
                        'present_location'          => $request->presentLocation,
                        'join_date_present_unit'    => $request->dateOfJoin,
                        'image'                     => "backend/images/person.png",
                        'enrolment_date'            => $request->dateOfEnrolment,
                        'present_rank_date'         => $request->dateOfPresentRank,
                        'retirement_date'           => $request->dateOfRetirement,
                        'civ_edn'                   => $request->cidEdn,
                        'med_cat'                   => $request->medCat,
                        'next_rank'                 => $request->qualUnqualRank,
                        'permanent_address'         => $request->permanentAddress,
                        'marital_status'            => $request->meritalStatus,
                        'children_number'           => $request->noOfChildren,
                        'status'                    => 1,
                        'created_by'                => session('AdminId'),
                        'updated_by'                => session('AdminId'),
                    ]
                );
            }

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
                    'id'                        => $id,
                ],
                [
                    'name'                      => $request->name,
                    'present_location'          => $request->presentLocation,
                    'join_date_present_unit'    => $request->dateOfJoin,
                    'image'                     => $Image,
                    'enrolment_date'            => $request->dateOfEnrolment,
                    'present_rank_date'         => $request->dateOfPresentRank,
                    'retirement_date'           => $request->dateOfRetirement,
                    'civ_edn'                   => $request->cidEdn,
                    'med_cat'                   => $request->medCat,
                    'next_rank'                 => $request->qualUnqualRank,
                    'permanent_address'         => $request->permanentAddress,
                    'marital_status'            => $request->meritalStatus,
                    'children_number'           => $request->noOfChildren,
                    'status'                    => 1,
                    'created_by'                => session('AdminId'),
                    'updated_by'                => session('AdminId'),
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
                            'remark'    => $request->course_remark[$key],
                            'duration'  => $request->course_duration[$key],
                            'result'    => $request->course_result[$key],
                            'status'    => 1,
                            'created_by' => session('AdminId'),
                            'updated_by' => session('AdminId'),
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
                            'parade_id'   => $parade->id,
                            'remark'      => $request->training_remark[$key],
                            'duration'    => $request->training_duration[$key],
                            'result'      => $request->training_result[$key],
                            'status'      => 1,
                            'created_by'  => session('AdminId'),
                            'updated_by'  => session('AdminId'),
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
}
