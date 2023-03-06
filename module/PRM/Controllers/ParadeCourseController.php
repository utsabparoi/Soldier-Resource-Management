<?php

namespace Module\PRM\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\FileSaver;
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
            $data['parade_courses']  = ParadeCourseModel::paginate(20);
            $data['table']  = ParadeCourseModel::getTableName();
            return view('pages.parade-course.index', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
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

            return redirect()->route('prm.parade-courses.index')->with('success','Course Created Successfully');

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
        try {
            $course= ParadeCourseModel::updateOrCreate([
                'id'           =>$id,
            ],[
                'course_id'    =>$request->course_id,
                'parade_id'    =>$request->parade_id,
                'serial_no'    =>$request->serial_no,
                'duration'     =>$request->duration,
                'result'       =>$request->result,
                'remark'       =>$request->remark,
                'status'       =>$request->status ? 1: 0,
            ]);
            return $course;
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    // public function unmatched_course(Request $request){
    //     try{
    //         $data = ParadeCourseModel::where('parade_id', $request->parade_id)->with('ads_serial')->get();
    //         return $data;
    //     }catch(\Throwable $th){
    //         return redirect()->back()->with('error', $th->getMessage());
    //     }
    // }
}
