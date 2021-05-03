
    @extends('layout.layout')


    @section('title')
       add vendor  page
    @endsection
    
    
    
    @section('content')
    

        <div class="container">
            <h1>اضافة  التاجر</h1>
            @include('alert.success')
            @include('alert.error')
            <form action="{{route('vendor.store')}} " enctype="multipart/form-data"  method="post">
             
                @csrf
               
            
                    
                <div class="form-group mt-4">
                  
                    <label for="full_name"> الاسم الكامل للتاجر</label>
                    <input type="text" name="full_name" id="full_name" class="form-control" placeholder="اسم " >
                
                    @error("full_name")
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>
                
                <div class="form-group mt-4">
                  
                    <label for="adress"> العنوان</label>
                    <input type="text" name="adress" id="adress" class="form-control" placeholder="العنوان" >
                
                    @error("adress")
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>


                <div class="form-group mt-4">
                  
                    <label for="mobile"> رقم الهاتف</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="رقم الهاتف" >
                
                    @error("mobile")
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>






                <div class="form-group mt-4">
                  
                    <label for="email"> البريد الالكتروني </label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="البريد الالكتروني" >
                
                    @error("email")
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>
                



                <div class="form-group mt-4">
                  
                    <label for="password"> كلمة المرور</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="كلمة المرور" >
                
                    @error("password")
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>



                <div class="form-group">
                  
                    <label for="main_categorie_id"> اسم القسم الرئيسي</label>
                    
                    <select name="main_categorie_id" id="main_categorie_id">
                        @foreach ($categories as $category)
                        
                           <option value="{{$category->id}}">{{$category->name}}</option>

                        @endforeach
                        

                    </select>
                    
                    @error("main_categorie_id")
                         <p class="text-danger"> {{$message}}</p>
                     @enderror

                </div>
            
               <div>
                 
                <input type="checkbox"  name="active" value="1">
                <label class="custom-control-label" for="switch1">مفعلة</label>
               
                @error("active")
                <p class="text-danger">{{$message}}</p>
                 @enderror
               
                </div>
               <hr>
         
                <div class="form-group">
                  
                    <label for="photo">صورة التاجر</label>
                    <input type="file" name="photo" id="photo" class="form-control"  >
                    @error('photo')
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>
    







           
              <button type="submit">تأكيد</button>
    
    
    
            </form>
    
        </div>
            
    
    
    
    @endsection
        