<?php

namespace Module\PRM\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\PRM\Models\ParadeModel;

class ParadeController extends Controller
{
    private $service;


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
        $data = [];
        return view('', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        # code...
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
}
