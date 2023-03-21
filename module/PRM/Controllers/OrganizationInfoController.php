<?php

namespace Module\PRM\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Module\PRM\Models\OrganizationInfo;

class OrganizationInfoController extends Controller
{
    function OrganizationInformation(){
        return view('pages.organization-info.organizationInformation');
    }
    function OrganizationInformationUpdate(Request $request){
        $favicon= $request->input("Favicon");
        $name = $request->input("Name");
        $title = $request->input("Title");
        $phoneOne = $request->input("PhoneOne");
        $phoneTwo = $request->input("PhoneTwo");
        $hotLine = $request->input("HotLine");
        $primaryEmail = $request->input("PrimaryEmail");
        $secondaryEmail = $request->input("SecondaryEmail");
        $primaryAddress = $request->input("PrimaryAddress");
        $companyLogo = $request->input("CompanyLogo");
        $website = $request->input("Website");
        $binNO = $request->input("BinNO");
        $googleMap = $request->input("GoogleMap");
        $secondaryAddress = $request->input("SecondaryAddress");
        $metaKeyword = $request->input("MetaKeyword");
        $metaDescription = $request->input("MetaDescription");

        if($name == ""){
            OrganizationInfo::where("id", "=", 1)->update(["name" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["name" => $name]);
        }

        if($title == ""){
            OrganizationInfo::where("id", "=", 1)->update(["title" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["title" => $title]);
        }

        if($phoneOne == ""){
            OrganizationInfo::where("id", "=", 1)->update(["phone_one" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["phone_one" => $phoneOne]);
        }

        if($phoneTwo == ""){
            OrganizationInfo::where("id", "=", 1)->update(["phone_two" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["phone_two" => $phoneTwo]);
        }
        if($hotLine == ""){
            OrganizationInfo::where("id", "=", 1)->update(["hot_line" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["hot_line" => $hotLine]);
        }

        if($primaryEmail == ""){
            OrganizationInfo::where("id", "=", 1)->update(["primary_email" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["primary_email" => $primaryEmail]);
        }

        if($secondaryEmail == ""){
            OrganizationInfo::where("id", "=", 1)->update(["secondary_email" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["secondary_email" => $secondaryEmail]);
        }

        if($primaryAddress == ""){
            OrganizationInfo::where("id", "=", 1)->update(["primary_address" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["primary_address" => $primaryAddress]);
        }

        if($website == ""){
            OrganizationInfo::where("id", "=", 1)->update(["website" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["website" => $website]);
        }

        if($binNO == ""){
            OrganizationInfo::where("id", "=", 1)->update(["bin_no" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["bin_no" => $binNO]);
        }

        if($googleMap == ""){
            OrganizationInfo::where("id", "=", 1)->update(["google_map" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["google_map" => $googleMap]);
        }

        if($secondaryAddress == ""){
            OrganizationInfo::where("id", "=", 1)->update(["secondary_address" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["secondary_address" => $secondaryAddress]);
        }

        if($metaKeyword == ""){
            OrganizationInfo::where("id", "=", 1)->update(["meta_keyword" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["meta_keyword" => $metaKeyword]);
        }

        if($metaDescription == ""){
            OrganizationInfo::where("id", "=", 1)->update(["meta_description" => ""]);
        }
        else{
            OrganizationInfo::where("id", "=", 1)->update(["meta_description" => $metaDescription]);
        }

        if($favicon ==  "undefined"){
            ;
        }
        else{
            //delete present favicon
            $websiteInformation = OrganizationInfo::find(1);
            $present_favicon = (explode('/', $websiteInformation->favicon))[3];
            Storage::delete("public/images/".$present_favicon);

            //upload new favicon
            $new_favicon = $request->file('Favicon')->store('public/images');
            $new_favicon_explode = (explode('/', $new_favicon))[2];
            $new_favicon_url = "/storage/images/" . $new_favicon_explode;
            OrganizationInfo::where("id", "=", 1)->update(["favicon"=>$new_favicon_url]);
        }



        if($companyLogo ==  "undefined"){

        }
        else{
            //delete present website logo
            $websiteInformation = OrganizationInfo::find(1);
            $present_website_logo = (explode('/', $websiteInformation->company_logo))[3];
            Storage::delete("public/images/".$present_website_logo);

            //upload new website logo
            $new_website_logo = $request->file('CompanyLogo')->store('public/images');
            $new_website_logo_explode = (explode('/', $new_website_logo))[2];
            $new_website_logo_url = "/storage/images/" . $new_website_logo_explode;
            OrganizationInfo::where("id", "=", 1)->update(["company_logo"=>$new_website_logo_url]);
        }

        return 1;
    }
}
