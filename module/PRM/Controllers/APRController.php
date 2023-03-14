<?php

namespace Module\PRM\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\PRM\Models\APRModel;
use Module\PRM\Models\ParadeModel;

class APRController extends Controller
{
    private $service;


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
            $data['annual_reports'] = APRModel::with('parade')->paginate(30);
            $data['all_report'] = APRModel::all()->count();
            return view('pages.annual-progress-report.index', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
        return view('', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data['soldier'] = ParadeModel::all();
        return view('pages.annual-progress-report.create', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $this->storeOrUpdate($request);
        return redirect()->route('prm.apr.index')->with('success', 'Soldier APR Created Successfully');
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
            $data['report'] = APRModel::find($id);
            return view('pages.annual-progress-report.edit', $data);
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
        $this->storeOrUpdate($request, $id);
        return redirect()->route('prm.apr.index')->with('success', 'Soldier APR Update Successfully');
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        try {
            $store = APRModel::find($id);
            $store->delete();
            return redirect()->back()->with('success', 'APR Deleted Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }



    public function storeOrUpdate($request, $id = null)
    {
        try {
            $annual_report = APRModel::updateOrCreate([
                'id' => $id,
            ],
                [
                    'parade_id'         => $request->paradeID,
                    'annual_report'     => $request->annualReport,
                    'status'            => 1,
                    'created_by'        => session('AdminId'),
                    'updated_by'        => session('AdminId'),
                ]);
            return $annual_report;
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
