<?php

namespace Module\PRM\Controllers;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Module\PRM\Models\Course;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{

    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $data['courses']  = Course::paginate(20);
            $data['table']  = Course::getTableName();
            return view('pages.course.index', $data);
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
        return view('pages.course.create');
    }

    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        // ddd($request);
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $this->storeOrUpdate($request);

            return redirect()->route('prm.course.index')->with('success','Course Created Successfully');

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
            $data['course'] = Course::find($id);
            return view('pages.course.edit', $data);
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
            'name' => 'required',
        ]);

        try {
            $this->storeOrUpdate($request, $id);

            return redirect()->route('prm.course.index')->with('success','Course Updated Success');
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
            $camp = Course::find($id);
            $camp->delete();

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
            $camp= Course::updateOrCreate([
                'id'                    =>$id,
            ],[
                'name'                  =>$request->name,
                'status'                =>$request->status ? 1: 0,
            ]);
            return $camp;
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
