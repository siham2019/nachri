@extends('layout.layout')


@section('title')
   add language page
@endsection



@section('content')


    <div class="container">
        <h1>اضافة اللغة</h1>

        @include('alert.success')
        @include('alert.error')
        
        <form action="{{route('language.update')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$language->id}}">
            <div class="form-group">
              
                <label for="name">اسم اللغة</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$language->name}}" placeholder="اسم اللغة" >
                 @error('name')
                     <p>{{$message}}</p>
                 @enderror
            </div>

            <div class="form-group">
              
                <label for="abbr">اختصار</label>
                <input type="text" name="abbr" id="abbr" class="form-control" value="{{$language->abbr}}" placeholder="الاختصار" >
                @error('abbr')
                     <p>{{$message}}</p>
                 @enderror
            </div>
           <div class="custom-control custom-switch">

            <input type="checkbox" class="custom-control-input" id="switch1" name="active" value="1"  {{$language->active=='1'?'checked':''}}>
            <label class="custom-control-label" for="switch1">مفعلة</label>
             @error('active')
               <p>{{$message}}</p>
             @enderror
           </div>

          <select name="direction"  value="{{$language->direction}}">
              <option value="ltr">من اليسار الى اليمين</option>
              <option value="rtl"> من اليمين الى اليسار</option>
          </select>
            @error('direction')
               <p>{{$message}}</p>
           @enderror
          <button type="submit" id="submit">تأكيد</button>



        </form>

    </div>
        
 
@endsection
    