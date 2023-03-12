<?php

namespace Module\PRM\Controllers;

use Module\PRM\Models\Camp;
use Illuminate\Http\Request;
use Module\PRM\Models\ParadeModel;
use App\Http\Controllers\Controller;
use App\Traits\FileSaver;
use Module\PRM\Models\ParadeCampMigration;

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
            $data['parade_migrations']  = ParadeCampMigration::paginate(20);
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
    public function paradeCampMigrate()
    {
        $data['parades'] = ParadeModel::all();
        $data['camps'] = Camp::all();

        return view('pages.parade-migrate.paradeCampMigrate', $data);
    }

    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        // ddd($request);
        try {
            $this->storeOrUpdate($request);

            return redirect()->route('prm.parade-migrate.index')->with('success','Parade Migrate Successful');

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
            $parade_migration->delete();

            return redirect()->back()->with('success','Parade Migration Deleted Success');
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
            $parade_migration= ParadeCampMigration::updateOrCreate([
                'id'           =>$id,
            ],[
                'parade_id'          =>$request->parade_id,
                'camp_id'            =>$request->camp_id,
                'migration_date'     =>$request->migration_date,
                'status'             =>$request->status ? 1: 0,
            ]);
            return $parade_migration;
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function previous_camp(Request $request){
        try{
            $data = Camp::where('parade_id', $request->parade_id)->with('course', 'parade')->get();

            return response()->json($data);
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
