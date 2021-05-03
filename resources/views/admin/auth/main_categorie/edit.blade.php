
    @extends('layout.layout')


    @section('title')
       edit main categorie  page
    @endsection
    
    
    
    @section('content')
    
    
        <div class="container">
            <h1>اضافة القسم الرئيسي</h1>
            @include('alert.success')
            @include('alert.error')
            <form action="{{route('categorie.update',$category->id)}} " enctype="multipart/form-data"  method="post">
             
                @csrf
                    <input type="hidden" name="id" value="{{$category->id}}">
                <div class="form-group mt-4">
                  
                    <label for="name">  اسم القسم الرئيسي {{ __('messages.'.$category->translate_lang) }}</label>
                    <input type="text" name="category[0][name]" id="name" value="{{$category->name}}" class="form-control" placeholder="اسم القسم" >
                
                    @error("category.0.name")
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>
    
                <div class="form-group">
                  
                    <label for="translate_lang"> اختصار اللغة</label>
                    <input type="hidden" name="category[0][translate_lang]" value="{{$category->translate_lang}}" id="translate_lang" class="form-control" placeholder="الاختصار" >
                    
                    @error("category.0.translate_lang")
                         <p class="text-danger"> {{$message}}</p>
                     @enderror

                </div>
            
               <div>
                 
                <input type="checkbox"  name="category[0][active]" value="1" @if($category->active==1) checked @endif>
                <label class="custom-control-label" for="switch1">مفعلة</label>
               
                @error("category.0.active")
                <p class="text-danger">{{$message}}</p>
                 @enderror
               
                </div>
               <hr>
        
                <div class="form-group">
                  
                    <label for="photo">صورة القسم</label>
                     
                    <div>
                         <img src="{{url($category->photo)}}" alt="photo" style="width: 100px;">
                    </div>
                    
                     <input type="file" name="photo" id="photo" class="form-control"  >
                    @error('photo')
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>
    







           
              <button type="submit">تأكيد</button>
    
    
    
            </form>
    

             @foreach ($category->categories as $c)
                 



             <form action="{{route('categorie.update',$c->id)}} " enctype="multipart/form-data" class="bg-secondary text-light p-3 mt-2"  method="post">
             
                @csrf
                    <input type="hidden" name="id" value="{{$c->id}}">
                <div class="form-group mt-4">
                  
                    <label for="name">  اسم القسم الرئيسي {{ __('messages.'.$c->translate_lang) }}</label>
                    <input type="text" name="category[0][name]" id="name" value="{{$c->name}}" class="form-control" placeholder="اسم القسم" >
                
                    @error("category.0.name")
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>
    
                <div class="form-group">
                  
                    <label for="translate_lang"> اختصار اللغة</label>
                    <input type="hidden" name="category[0][translate_lang]" value="{{$c->translate_lang}}" id="translate_lang" class="form-control" placeholder="الاختصار" >
                    
                    @error("category.0.translate_lang")
                         <p class="text-danger"> {{$message}}</p>
                     @enderror

                </div>
            
               <div>
                 
                <input type="checkbox"  name="category[0][active]" value="1" @if($c->active==1) checked @endif>
                <label class="custom-control-label" for="switch1">مفعلة</label>
               
                @error("category.0.active")
                <p class="text-danger">{{$message}}</p>
                 @enderror
               
                </div>
             
                <button type="submit">submit</button>
             
              </form>
             
                @endforeach





        </div>
            
    
    
    
    @endsection
        