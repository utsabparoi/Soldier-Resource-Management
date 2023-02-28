<?php

namespace Module\PRM\Controllers;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    }












    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $data['parade']  = ParadeModel::paginate(20);
            $data['table']  = ParadeModel::getTableName();
            return view('pages.parade.index', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }


    public function paradeProfile($id)
    {
        $data['parade'] = ParadeModel::find($id);
//        $data['allCourses'] = CourseModel::all();
//        $data['courses'] = EmployeeCourseResultModel::where('employee_id', '=', $id)->get();
        return view('pages.parade.paradeProfile', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('pages.parade.create');
    }



    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
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
            $data['courses'] = Course::all();
            $data['training'] = Training::all();
            return view('pages.parade.addExtraInformation', compact('profileData'), $data);
        }
        else if ($request->submitButton == 'save'){
            try {
                $this->storeOrUpdate($request);
                return redirect()->route('prm.parade.index')->with('success','Parade Created Successfully');

            } catch (\Throwable $th) {
                return redirect()->back()->with('error',$th->getMessage());
            }
        }
        else if ($request->submitButton == 'saveWithExtraInfo'){
            try {
                $this->storeOrUpdateWithExtraInfo($request);
                return redirect()->route('prm.parade.index')->with('success','Parade Created Successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error',$th->getMessage());
            }
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
        # code...
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
        try {
            $store= ParadeModel::find($id);
            $store->delete();

            return redirect()->back()->with('success','Parade Deleted Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function storeOrUpdate($request, $id = null)
    {
        try {
            $parade = ParadeModel::updateOrCreate([
                'id'                        =>$id,
            ],
                [
                    'name'                      =>$request->name,
                    'present_location'          =>$request->presentLocation,
                    'join_date_present_unit'    =>$request->dateOfJoin,
                    'enrolment_date'            =>$request->dateOfEnrolment,
                    'present_rank_date'         =>$request->dateOfPresentRank,
                    'retirement_date'           =>$request->dateOfRetirement,
                    'civ_edn'                   =>$request->cidEdn,
                    'med_cat'                   =>$request->medCat,
                    'next_rank'                 =>$request->qualUnqualRank,
                    'permanent_address'         =>$request->permanentAddress,
                    'marital_status'            =>$request->meritalStatus,
                    'children_number'           =>$request->noOfChildren,
                    'status'                    =>1,
                ]);
            $this->upload_file($request->image, $parade, 'image', 'images/paradeProfile');
            return $parade;
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function storeOrUpdateWithExtraInfo($request, $id = null)
    {
        try {
            $parade = ParadeModel::updateOrCreate([
                'id'                        =>$id,
            ],
                [
                'name'                      =>$request->name,
                'present_location'          =>$request->presentLocation,
                'join_date_present_unit'    =>$request->dateOfJoin,
                'enrolment_date'            =>$request->dateOfEnrolment,
                'present_rank_date'         =>$request->dateOfPresentRank,
                'retirement_date'           =>$request->dateOfRetirement,
                'civ_edn'                   =>$request->cidEdn,
                'med_cat'                   =>$request->medCat,
                'next_rank'                 =>$request->qualUnqualRank,
                'permanent_address'         =>$request->permanentAddress,
                'marital_status'            =>$request->meritalStatus,
                'children_number'           =>$request->noOfChildren,
                'status'                    =>1,
            ]);
            $this->upload_file($request->image, $parade, 'image', 'images/paradeProfile');

            //course add
            foreach ($request->course as $key => $value) {
                $paradeCourse = ParadeCourseModel::updateOrCreate([
                    'id' => $id,
                ],
                    [
                        'course_id' => Course::where('name', '=', $request->course[$key])->first()->id,
                        'parade_id' => $parade->id,
                        'remark'    => $request->course_remark[$key],
                        'duration'  => $request->course_duration[$key],
                        'result'    => $request->course_result[$key],
                        'status'    => 1,
                    ]);
            }

            //training add
            foreach ($request->training as $key => $value) {
                $paradeTraining = ParadeTrainingModel::updateOrCreate([
                    'id' => $id,
                ],
                    [
                        'training_id' => Training::where('name', '=', $request->training[$key])->first()->id,
                        'parade_id'   => $parade->id,
                        'remark'      => $request->training_remark[$key],
                        'duration'    => $request->training_duration[$key],
                        'result'      => $request->training_result[$key],
                        'status'      => 1,
                    ]);
            }
            return $parade;
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

}
