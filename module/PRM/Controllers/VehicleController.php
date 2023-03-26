<?php

namespace Module\PRM\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Module\PRM\Models\VehicleModel;

class VehicleController extends Controller
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
        $data['vehicles'] = VehicleModel::paginate(30);
        $data['table'] = VehicleModel::getTableName();
        return view('pages.vehicle.index', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data['vehicleCategories'] = DB::table('vehicle_categories')->get();
        return view('pages.vehicle.create', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $this->storeOrUpdate($request);
        return view('pages.vehicle.index');
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
            $vehicle = VehicleModel::find($id);
            $vehicle->delete();

            return redirect()->back()->with('success','Vehicle Deleted Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function storeOrUpdate($request, $id = null)
    {
        try {
            $vehicle = VehicleModel::updateOrCreate([
                'id'                    =>$id,
            ],[
                'vehicle_category_id'  => $request->vehicleCategories,
                'name'                  => $request->name,
                'engine_number'         => $request->engineNumber,
                'chassis_number'        => $request->chassisNumber,
                'model_year'            => $request->modelYear,
                'status'                => 1,
                'created_by'            => auth()->id(),
                'updated_by'            => auth()->id(),
            ]);
            return $vehicle;
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
