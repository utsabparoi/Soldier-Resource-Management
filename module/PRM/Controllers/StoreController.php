<?php

namespace Module\PRM\Controllers;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\PRM\Models\Camp;
use Module\PRM\Models\StoreModel;

class StoreController extends Controller
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
            $data['store']  = StoreModel::paginate(20);
            $data['table']  = StoreModel::getTableName();
            return view('pages.store.index', $data);
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
        $data['camp']  = Camp::get('name');
        return view('pages.store.create', $data);
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

            return redirect()->route('prm.store.index')->with('success','Store Created Successfully');

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
            $data['store'] = StoreModel::find($id);
            $data['camp']  = Camp::get('name');
            return view('pages.store.edit', $data);
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

            return redirect()->route('prm.store.index')->with('success','Store Updated Success');
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
            $store= StoreModel::find($id);
            $store->delete();

            return redirect()->back()->with('success','Store Deleted Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function getCampStore(Request $request){
        $campId = $request->input('CampId');
        $campStoreName = StoreModel::where('camp_id', '=', $campId)->first()->name;
        $campStoreManName = StoreModel::where('camp_id', '=', $campId)->first()->store_man;
        $campStoreCount = StoreModel::where('camp_id', '=', $campId)->count();
        return response()->json(["storename"=>$campStoreName, "storemanname"=>$campStoreManName,
            "count"=>$campStoreCount]);
    }


    public function storeOrUpdate($request, $id = null)
    {
        try {
            $store = StoreModel::updateOrCreate([
                'id'                    =>$id,
            ],[
                'name'                 =>$request->name,
                'store_man'            =>$request->storeMan,
                'camp_id'              => Camp::where('name', '=', $request->campName)->first()->id,
                'status'               =>$request->status ? 1: 0,
            ]);
            return $store;
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
