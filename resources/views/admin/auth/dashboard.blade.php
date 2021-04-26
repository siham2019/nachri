@extends('layout.layout')


@section('title')
   welcome page
@endsection



@section('content')



        
   <div  class="text-center">
          <h3>welcome to dashboard</h3>
          <div class="d-flex justify-content-center ">
            <a href="/admin/language/" class="mr-2"> {{-- ({{ Language::count() }}) --}}لغات الموقع</a>
            <a href="/admin/main-categorie/" class="mr-2">اقسام الرئيسية  للموقع</a>
           <a href="/admin/logout">logout</a>
          </div>
   </div>


   <form action="/photo/save" enctype="multipart/form-data" method="POST">
      @csrf
      <label for="photo">photo</label>
      <input type="file" name="h" id="photo">
      <button type="submit">submit</button>
   </form>






@endsection
    