<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        return view('admin.auth.language.index',['languages'=>Language::all()]);
    }
    
    public function create()
    {
        return view('admin.auth.language.add');
        
    }

    public function store(LanguageRequest $request)
    {

         $active =$request->active==1?'1':'0';


/*       try { 
 */            
            $language=new Language();   
     
            $language->name=$request->name;
            $language->direction =$request->direction;
            $language->abbr=$request->abbr; 
            $language->active=$active;
            
            $language->save();

            return redirect('/admin/language/')->with('success','تمت اضافة اللغة بنجاح');

 /*       } catch (\Exception $th) {

            return back()->with('error','حدث خطأ ما يرجى اعادة المحاولة لاحقا');
         
        }  */
  
    }


    public function edit($id)
    {
        return view('admin.auth.language.edit',['language'=>Language::find($id)]);
    }

    public function update(LanguageRequest $request)
    {
       
       try {  
          

            if(!$request->has('active')){
               $request->request->add(['active'=>'0']);
            } 
           

            Language::where('id',$request->id)->update($request->except('_token'));
          
            return redirect('/admin/language/')->with('success','تمت تعديل اللغة بنجاح');
        
        } catch(\Exception $e){

            return back()->with('error','حدث خطأ ما يرجى اعادة المحاولة لاحقا');
 
        }

    }
    
    public function delete($id)
    {
          
       try {  
 
        Language::where('id',$id)->delete();
      
        return back()->with('success','تم حذف اللغة بنجاح');
    
    } catch(\Exception $e){

        return back()->with('error','حدث خطأ ما يرجى اعادة المحاولة لاحقا');

    }

    }
}
