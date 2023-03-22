<?php

namespace Module\PRM\Controllers;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\PRM\Models\OrganizationInfo;

class OrganizationInfoController extends Controller
{
    use FileSaver;



    /*
     |--------------------------------------
     |          Index METHOD
     |--------------------------------------
    */
    function index(){
        return view('pages.organization-info.organizationInformation',[
            'allSiteInfo'=> OrganizationInfo::first(),
        ]);
    }




    /*
     |--------------------------------------
     |          Update METHOD
     |--------------------------------------
    */
    function update(Request $request){

        try {
            $model = OrganizationInfo::first();

            if($request->file('organization_logo') != NULL)
            {
                $model->update([
                    'name'              => $request->name,
                    'phone_one'         => $request->phone_one ?? 0,
                    'phone_two'         => $request->phone_two ?? 0,
                    'primary_email'     => $request->primary_email,
                    'secondary_email'   => $request->secondary_email,
                    'address'           => $request->address,
                    'organization_logo' => $model->organization_logo,
                    'website_url'       => $request->website_url ?? 0,
                    'description'       => $request->description ?? 0,
                    'google_map'        => $request->google_map ?? 0,
                ]);

                $this->uploadFileWithResize($request->organization_logo, $model, 'organization_logo', 'uploads/OrganizationLogo', 150, 150);
            }
            else{
                $model->update([
                    'name'              => $request->name,
                    'phone_one'         => $request->phone_one ?? 0,
                    'phone_two'         => $request->phone_two ?? 0,
                    'primary_email'     => $request->primary_email,
                    'secondary_email'   => $request->secondary_email,
                    'address'           => $request->address,
                    'website_url'       => $request->website_url ?? 0,
                    'description'       => $request->description ?? 0,
                    'google_map'        => $request->google_map ?? 0,
                ]);
            }


            return back()->with('success','Data Updated Successfully');

        }
        catch(\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }


    }
}
