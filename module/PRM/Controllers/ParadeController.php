<?php

namespace Module\PRM\Controllers;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\PRM\Models\Course;
use Module\PRM\Models\ParadeModel;
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

    public function addExtraInformation()
    {
        $data['courses'] = Course::all();
        $data['training'] = Training::all();
        return view('pages.parade.addExtraInformation', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $this->storeOrUpdate($request);

            return redirect()->route('prm.parade.index')->with('success','Parade Created Successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
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
        # code...
    }

    public function storeOrUpdate($request, $id = null)
    {
        try {
            $parade = ParadeModel::updateOrCreate([
                'id'                    =>$id,
            ],[
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
}
