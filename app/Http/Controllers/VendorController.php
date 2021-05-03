<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRequest;
use App\Models\MainCategorie;
use App\Models\Vendor;
use App\Notifications\VendorNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class VendorController extends Controller
{


    public function index()
    {
       return view('admin.auth.vendor.index',['vendors'=>Vendor::all()]);
    }

    public function create()
    {
       return view('admin.auth.vendor.create',['categories'=>MainCategorie::getActive()]);
    }


    public function store(VendorRequest $request){

         try {
            
    

            if (!$request->has("active")) {
               $request->request->add(['active'=>"0"]);
            }
               $data=$request->except('token');
         
                $file=uploadImage($request->photo,"images/vendors/");
                $data["photo"]=$file;

                
            $vendor=Vendor::create($data);
            Notification::send($vendor, new VendorNotification($vendor));

             return redirect("/admin/vendors")->with("success","تمت اضافة التاجر بنجاح");


         } catch (\Exception $ex) {

            return redirect("/admin/vendors")->with("error","حدث خطأ يرجى اعادة المحاولة لاحقا");
         }

    }


    public function edit($id){

      try {
         $vendors=Vendor::find($id);

         if (!$vendors) {
             return redirect('admin/vendors')->with("error","هذا التاجر غير متوفر");
         }


         return view("admin.auth.vendor.edit",["vendor"=> $vendors,"categories"=>MainCategorie::getActive()]);

      } catch (\Exception $th) {
         return redirect("/admin/vendors")->with("error","حدث خطأ يرجى اعادة المحاولة لاحقا");

      }
     
    }


    public function update($id,VendorRequest $request){

      try {
         $vendors=Vendor::find($id);

         if (!$vendors) {
             return redirect('admin/vendors')->with("error","هذا التاجر غير متوفر");
         }


         if (!$request->has("active")) {
            $request->request->add(['active'=>"0"]);
         }

         Vendor::where("id",$id)->update($request->except('_token','id',"photo"));

         if ($request->has("photo")) {
          
            $file=uploadImage($request->photo,"images/vendors/");

            Vendor::where("id",$id)->update([
               "photo"=>   $file
            ]);

         }

          return redirect("/admin/vendors")->with("success","تمت تعديل التاجر بنجاح");
          



      } catch (\Exception $th) {
         return redirect("/admin/vendors")->with("error","حدث خطأ يرجى اعادة المحاولة لاحقا");

      }

    }


}
