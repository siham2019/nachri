@extends('layout.layout')


@section('title')
   welcome page
@endsection



@section('content')



        
   <div  class="text-center">
          <h3>welcome to dashboard</h3>
          <div class="d-flex justify-content-center ">
            <a href="/admin/language/" class="mr-2"> {{-- ({{ Language::count() }}) --}}لغات الموقع</a>
           <a href="/admin/logout">logout</a>
          </div>
   </div>







@endsection
    