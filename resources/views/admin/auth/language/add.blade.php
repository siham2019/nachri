@extends('layout.layout')


@section('title')
   add language page
@endsection



@section('content')


    <div class="container">
        <h1>اضافة اللغة</h1>
        @include('alert.success')
        @include('alert.error')
        <form action="{{route('store')}}" method="post">
            @csrf
            <div class="form-group">
              
                <label for="name">اسم اللغة</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="اسم اللغة" >
                 @error('name')
                     <p>{{$message}}</p>
                 @enderror
            </div>

            <div class="form-group">
              
                <label for="abbr">اختصار</label>
                <input type="text" name="abbr" id="abbr" class="form-control" placeholder="الاختصار" >
                @error('abbr')
                     <p>{{$message}}</p>
                 @enderror
            </div>
           <div class="custom-control custom-switch">
             
            <input type="checkbox" class="custom-control-input" id="switch1" name="active" value="1">
            <label class="custom-control-label" for="switch1">مفعلة</label>
             @error('active')
               <p>{{$message}}</p>
             @enderror
           </div>

          <select name="direction" >
              <option value="ltr">من اليسار الى اليمين</option>
              <option value="rtl"> من اليمين الى اليسار</option>
          </select>
            @error('direction')
               <p>{{$message}}</p>
           @enderror
          <button type="submit">تأكيد</button>



        </form>

    </div>
        



@endsection
    