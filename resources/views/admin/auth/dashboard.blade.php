@extends('layout.layout')


@section('title')
   welcome page
@endsection



@section('content')



        
   <div  class="text-center">
          <h3>welcome to dashboard</h3>
          <div class="d-flex justify-content-center ">
            <a href="/admin/language/" class="mr-2"> {{App\Models\Language::activeCount() }} لغات الموقع</a>
            <a href="/admin/main-categorie/" class="mr-2"> {{App\Models\MainCategorie::activeCount() }} اقسام الرئيسية  للموقع</a>
            <a href="/admin/vendors/" class="mr-2"> {{App\Models\Vendor::count() }} التجار</a>

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
    