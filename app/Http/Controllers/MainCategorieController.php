<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainCategorieRequest;
use App\Models\MainCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainCategorieController extends Controller
{

    public function index()
    {
         $categories=MainCategorie::where('translate_lang',getLanguage())->get();
        return view('admin.auth.main_categorie.index',['categories'=>$categories]);
    }

    public function create()
    {
              
               return view('admin.auth.main_categorie.add',['languages'=> getActiveLanguage()]);

    }

     public function store(MainCategorieRequest $request)
     {
       $categories=collect($request->category);
 
       $default_category=$categories->filter(function($value){
              return $value['translate_lang']==getLanguage();
       });
       
         $file=uploadImage($request->photo,"images/main_categories/");
       

      DB::transaction(function () use($default_category,$file,$categories) {
        $id=MainCategorie::insertGetId(
          [
              'name'=>$default_category[0]['name'],
              'slug'=>$default_category[0]['name'],
              'description'=>'fgfgg hghghgg',
              'photo'=>$file,
              'translate_lang'=>getLanguage(),
              'translater_of'=>0,
              'active'=>$default_category[0]['active']
          ]
      );

      $category=$categories->filter(function($value){
       return $value['translate_lang']!=getLanguage();
      });

      if ($category->count()>0) {
             $categori=[];
             foreach ($category as $c) {
                 
                    $categori[]=[
                     
                       'name'=>$c['name'],
                       'slug'=>$c['name'],
                       'description'=>'fgfgg hghghgg',
                       'photo'=>$file,
                       'translate_lang'=>$c['translate_lang'],
                       'translater_of'=>$id,
                       'active'=>$c['active']
                    ];
             } 
             
             MainCategorie::insert($categori);
             
      }
      });


      return redirect("/admin/main-categories")->with('success',"تم اضافة القسم بنجاح");

     }

      public function edit($id)
      {
            $default_category=MainCategorie::find($id);

            if (!$default_category) {
                   
                 return back()->with('error',"هذا القسم غير متوفر");
            }


            return view('admin.auth.main_categorie.edit',['category'=>$default_category]); 
      }


      public function update($id,MainCategorieRequest $request)
      {
       $default_category=MainCategorie::find($id);

       if (!$default_category) {
              
            return back()->with('error',"هذا القسم غير متوفر");
       }
      
       if(!$request->has('category.0.active')){

              $request->request->add(['active'=>'0']);

       }
        else{
              $request->request->add(['active'=>'1']);

        }



       MainCategorie::where("id",$id)->update([
             "name"=>$request->category[0]['name'],
             "active"=>$request->active,
             "translate_lang"=>$request->category[0]['translate_lang'],
       ]);

       if ($request->has('photo')) {

              $file=uploadImage($request->photo,"images/main_categories/");

              MainCategorie::where("id",$id)->update([
                     "photo"=> $file
               ]);
              
       }

          return redirect("/admin/main-categorie")->with("success","تم تعديل بنجاح");

      }


      public function change($id){

       try {
              $categorie=MainCategorie::find($id);
     
              if (!$categorie) {
                  return redirect('admin/vendors')->with("error","هذا القسم غير متوفر");
              }
     
                 if ($categorie->active=="1") {
                     $categorie->update(["active"=>"0"]);
                     return redirect("/admin/main-categorie")->with("success","تمت الغاء تفعيل القسم بنجاح");

                 }
                 else {
                     $categorie->update(["active"=>"1"]);
                     return redirect("/admin/main-categorie")->with("success","تمت تفعيل  القسم بنجاح");

                 }


               
     
     
     
           } catch (\Exception $th) {
                  return $th;
              return redirect("/admin/main-categorie")->with("error","حدث خطأ يرجى اعادة المحاولة لاحقا");
     
           }

      }


      public function destroy($id){

         
             try {
                     $categorie=MainCategorie::find($id);

                      if (!$categorie) {
                                 return redirect('admin/vendors')->with("error","هذا القسم غير متوفر");
                         }



                        if ($categorie->vendors()->count()==0) {
                            
                            $categorie->delete();
                            return redirect('admin/main-categorie')->with("success","تم حذف هذا القسم بنجاح");

                        }
                        else {
                            return redirect('admin/main-categorie')->with("error","تم اضافة التجار لايمكنك حذف هذا القسم");

                        }



                } catch (\Exception $th) {
                                 return $th;
                        return redirect("/admin/main-categorie")->with("error","حدث خطأ يرجى اعادة المحاولة لاحقا");

                 }





      }





}