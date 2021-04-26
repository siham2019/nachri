
    @extends('layout.layout')


    @section('title')
       add main categorie language page
    @endsection
    
    
    
    @section('content')
    
    
        <div class="container">
            <h1>اضافة القسم الرئيسي</h1>
            @include('alert.success')
            @include('alert.error')
            <form action="{{route('categorie.store')}} " enctype="multipart/form-data"  method="post">
             
                @csrf
               
                @foreach ($languages as $index=>$language)
                    
                <div class="form-group mt-4">
                  
                    <label for="name">  اسم القسم الرئيسي {{ __('messages.'.$language->abbr) }}</label>
                    <input type="text" name="category[{{$index}}][name]" id="name" class="form-control" placeholder="اسم القسم" >
                
                    @error("category.$index.name")
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>
    
                <div class="form-group">
                  
                    <label for="translate_lang"> اختصار اللغة</label>
                    <input type="text" name="category[{{$index}}][translate_lang]" id="translate_lang" class="form-control" placeholder="الاختصار" >
                    
                    @error("category.$index.translate_lang")
                         <p class="text-danger"> {{$message}}</p>
                     @enderror

                </div>
            
               <div>
                 
                <input type="checkbox"  name="category[{{$index}}][active]" value="1">
                <label class="custom-control-label" for="switch1">مفعلة</label>
               
                @error("category.$index.active")
                <p class="text-danger">{{$message}}</p>
                 @enderror
               
                </div>
               <hr>
                @endforeach
                <div class="form-group">
                  
                    <label for="photo">صورة القسم</label>
                    <input type="file" name="photo" id="photo" class="form-control"  >
                    @error('photo')
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                </div>
    







           
              <button type="submit">تأكيد</button>
    
    
    
            </form>
    
        </div>
            
    
    
    
    @endsection
        