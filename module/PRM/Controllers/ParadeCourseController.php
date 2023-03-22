<?php

namespace Module\PRM\Controllers;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Module\PRM\Models\Course;
use Module\PRM\Models\ParadeModel;
use App\Http\Controllers\Controller;
use Module\PRM\Models\ParadeCourseModel;

class ParadeCourseController extends Controller
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
            $data['parade_courses']  = ParadeCourseModel::with('course','parade')->paginate(20);
            $data['table']  = ParadeCourseModel::getTableName();
            return view('pages.parade-course.index', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /*
     |--------------------------------------------------------------------------
     | ASSIGN-COURSE METHOD
     |--------------------------------------------------------------------------
    */
    public function assign_course(Request $request)
    {
        $data['parade_courses']  = ParadeCourseModel::with('course','parade')->paginate(20);
        $data['parades'] = ParadeModel::all();
        $data['courses'] = Course::where($request->parade_id);

        return view('pages.parade-course.assign-course', $data);
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

            return redirect()->route('prm.parade.index')->with('success','Course Created Successfully');

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
        try {
            $data['parade_course'] = ParadeCourseModel::find($id);
            return view('pages.parade-course.edit', $data);
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
        try {
            $this->storeOrUpdate($request, $id);

            return redirect()->route('prm.parade-courses.index')->with('success','Course Updated Success');
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
            $course = ParadeCourseModel::find($id);
            $course->delete();

            return redirect()->back()->with('success','Course Deleted Success');
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
        // try {
        //     $course= ParadeCourseModel::updateOrCreate([
        //         'id'           =>$id,
        //     ],[
        //         'course_id'    =>$request->course_id,
        //         'parade_id'    =>$request->parade_id,
        //         'serial_no'    =>$request->serial_no,
        //         'duration'     =>$request->duration,
        //         'result'       =>$request->result,
        //         'remark'       =>$request->remark,
        //         'status'       =>$request->status ? 1: 0,
        //     ]);
        //     return $course;
        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error',$th->getMessage());
        // }

        //course add
        if ($request->course[0] == "notSelect") {
        }
        else {
            foreach ($request->course as $key => $value) {
                $paradeCourse = ParadeCourseModel::updateOrCreate(
                    [
                        'id' => $id,
                    ],
                    [
                        // 'course_id' => Course::where('name', '=', $request->course[$key])->first()->id,
                        'course_id' => $request->course[$key],
                        'parade_id' => $request->parade_id,
                        'remark'    => $request->course_remark[$key],
                        'duration'  => $request->course_duration[$key],
                        'result'    => $request->course_result[$key],
                        'status'    => $request->status ? 1: 0,
                    ]
                );
            }
        }
    }

    public function unmatched_course(Request $request){
        try{
            $matchedCourses = ParadeCourseModel::where('parade_id', $request->parade_id)->get('course_id');
            $data   = Course::whereNotIn('id', $matchedCourses)->get();

            return response()->json($data);
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function taken_course(Request $request){

        try{
            $data = ParadeCourseModel::where('parade_id', $request->parade_id)->with('course', 'parade')->get();

            return response()->json($data);
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

}
