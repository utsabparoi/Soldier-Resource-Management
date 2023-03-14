<?php

namespace Module\PRM\Controllers;

use App\Traits\FileSaver;
use Module\PRM\Models\Camp;
use Illuminate\Http\Request;
use Module\PRM\Models\ParadeModel;
use App\Http\Controllers\Controller;
use Module\PRM\Models\ParadeCampMigration;
use Module\PRM\Models\ParadeCurrentProfileModel;

class ParadeCampMigrateController extends Controller
{
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
            $data['parade_migrations']  = ParadeCampMigration::with('camp','parade')->paginate(20);
            $data['table']  = ParadeCampMigration::getTableName();
            return view('pages.parade-migrate.index', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function manualCampMigrate()
    {
        $data['parades'] = ParadeModel::all();
        $data['camps'] = Camp::all();
        // $data['current_camp'] = ParadeCurrentProfileModel::latest();

        return view('pages.parade-migrate.manualCampMigrate', $data);
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

            return redirect()->route('prm.parade-migrate.index')->with('success','Soldier Migrate Successful');

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
            $data['parade_migration'] = ParadeCampMigration::find($id);
            $data['parades'] = ParadeModel::all();
            $data['camps'] = Camp::all();
            return view('pages.parade-migrate.edit', $data);
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

            return redirect()->route('prm.parade-migrate.index')->with('success','Course Updated Success');
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
            $parade_migration = ParadeCampMigration::find($id);
            $current_profile = ParadeCurrentProfileModel::find($id);

            $parade_migration->delete();
            $current_profile->delete();

            return redirect()->back()->with('success','Soldier Migration Deleted Success');
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
            $parade_migration_data = ParadeCampMigration::updateOrCreate([
                'id'           =>$id,
            ],[
                'parade_id'          =>$request->parade_id,
                'camp_id'            =>$request->camp_id,
                'migration_date'     =>$request->migration_date,
                'status'             =>$request->status ? 1: 0,
            ]);

            $current_profile_data = ParadeCurrentProfileModel::updateOrCreate([
                'id'           =>$id,
            ],[
                'parade_id'          =>$request->parade_id,
                'camp_id'            =>$request->camp_id,
                'status'             =>$request->status ? 1: 0,
            ]);
            return compact($parade_migration_data, $current_profile_data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }

    }

    public function currentCamp(Request $request){
        try{
            $current_data = ParadeCurrentProfileModel::where('parade_id', $request->parade_id)->with('camp')->latest()->first();
            if ($current_data) {
                $data = $current_data;
            }else {
                $base_profile_data = ParadeModel::where('id',$request->parade_id)->with('camp')->get();
                $data = $base_profile_data;
            }
            // $data = $current_data;
            return response()->json($data);
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    //bulk parade camp migrate view function
    public function bulkCampMigrate()
    {
        try {
            $data['parade'] = ParadeModel::with('camp')->paginate(30);
            $data['camp_name'] = Camp::all();
            $data['all_parade'] = ParadeModel::all();
            $data['table'] = ParadeModel::getTableName();
            return view('pages.parade-migrate.bulkCampMigrate', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }

    //bulk parade camp migrate store function
    public function bulkDataStore(Request $request, $id=null){
        //bulk input
        foreach($request->bulk_id as $key => $value){
            $bulk_migrateToCampMigrationTable = ParadeCampMigration::updateOrCreate([
                'id'           =>$id,
            ],[
                'parade_id'          =>$request->bulk_id[$key],
                'camp_id'            =>2,
                'migration_date'     =>"2023-03-17",
                'status'             =>$request->status ? 1: 0,
            ]);

            $bulk_migrateToCurrentProfileTable = ParadeCurrentProfileModel::updateOrCreate([
                'id'           =>$id,
            ],[
                'parade_id'          =>$request->bulk_id[$key],
                'camp_id'            =>2,
                'status'             =>$request->status ? 1: 0,
            ]);
        }
        return redirect()->route('prm.parade-migrate.index',compact($bulk_migrateToCampMigrationTable, $bulk_migrateToCurrentProfileTable))
        ->with('success','Soldier Migrate Successful');
    }

}
