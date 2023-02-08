<?php

namespace App\Http\Controllers;

use App\Models\CourseModel;
use App\Models\EmployeeCourseResultModel;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees'] = EmployeeModel::all();
        return view('backend.page.biodata.index', $data);
    }


    public function addExtraInformation()
    {
        $data['courses'] = CourseModel::all();
        return view('backend.page.biodata.addExtraInformation', $data);
    }

    public function singleBiodata($id)
    {
        $data['employee'] = EmployeeModel::find($id);
        $data['allCourses'] = CourseModel::all();
        $data['courses'] = EmployeeCourseResultModel::where('employee_id', '=', $id)->get();
        return view('backend.page.biodata.singleBiodata', $data);
    }

    public function confirmBiodata()
    {
        return view('backend.page.biodata.confirmBiodata');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.biodata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
