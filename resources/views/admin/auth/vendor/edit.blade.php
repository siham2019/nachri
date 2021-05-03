
    @extends('layout.layout')


    @section('title')
       edit vendor  page
    @endsection
    
    
    
    @section('content')
    

        <div class="container">
            <h1>تعديل  التاجر</h1>
            @include('alert.success')
            @include('alert.error')
            <form action="{{route('vendor.update',$vendor->id)}} " enctype="multipart/form-data"  method="post">
             
                @csrf
               
            <input type="hidden" name="id" value="{{$vendor->id}}">
                    
                <div class="form-group mt-4">
                  
                    <label for="full_name"> الاسم الكامل للتاجر</label>
                    <input type="text" name="full_name" id="full_name" value="{{$vendor->full_name}}" class="form-control" placeholder="اسم " >
                
                    @error("full_name")
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>
                
                <div class="form-group mt-4">
                  
                    <label for="adress"> العنوان</label>
                    <input type="text" name="adress" id="adress" value="{{$vendor->adress}}" class="form-control" placeholder="العنوان" >
                
                    @error("adress")
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>


                <div class="form-group mt-4">
                  
                    <label for="mobile"> رقم الهاتف</label>
                    <input type="text" name="mobile" id="mobile" value="{{$vendor->mobile}}" class="form-control" placeholder="رقم الهاتف" >
                
                    @error("mobile")
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>






                <div class="form-group mt-4">
                  
                    <label for="email"> البريد الالكتروني </label>
                    <input type="text" name="email"  value="{{$vendor->email}}"  id="email" class="form-control" placeholder="البريد الالكتروني" >
                
                    @error("email")
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>
                



                <div class="form-group mt-4">
                  
                    <label for="password"> كلمة المرور</label>
                    <input type="password" name="password"  value="{{$vendor->password}}" id="password" class="form-control" placeholder="كلمة المرور" >
                
                    @error("password")
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>



                <div class="form-group">
                  
                    <label for="main_categorie_id"> اسم القسم الرئيسي</label>
                    
                    <select name="main_categorie_id" id="main_categorie_id">
                        @foreach ($categories as $category)
                        
                           <option value="{{$category->id}}" @if($category->id==$vendor->categorie->id) selected @endif>{{$category->name}}</option>

                        @endforeach
                        

                    </select>
                    
                    @error("main_categorie_id")
                         <p class="text-danger"> {{$message}}</p>
                     @enderror

                </div>
            
               <div>
           

                <input type="checkbox"  name="active" value="1"  @if($vendor->active=="1") checked @endif>
                <label class="custom-control-label" for="switch1"  >مفعلة</label>
               
                @error("active")
                <p class="text-danger">{{$message}}</p>
                 @enderror
               
                </div>
               <hr>
         
                <div class="form-group">
                  
                    <label for="photo">صورة التاجر</label>
                    <div>
                        <img src="{{url($vendor->photo)}}" alt="photo" style="width: 100px;">
                   </div> 
                    <input type="file" name="photo" id="photo" class="form-control"  >
                    @error('photo')
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>
    







           
              <button type="submit">تأكيد</button>
    
    
    
            </form>
    
        </div>
            
    
    
    
    @endsection
        