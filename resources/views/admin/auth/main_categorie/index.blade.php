@extends('layout.layout')


@section('title')
   main categories page
@endsection



@section('content')


    <div class="container">
        <a href="/admin/main-categorie/add">اضافة القسم الرشيسي</a>
        @include('alert.success')
        @include('alert.error')
        <table border="1">
             <thead>
                 <th>اسم القسم الرئيسي</th>
                 <th>الحالة</th>
                 <th>اسم اللغة</th>
                 <th>الصورة</th>
                 <th>الاجراءات</th>
             </thead>
             <tbody>

                     @foreach ($categories as $category)
                     <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->active}}</td>
                        <td>{{$category->translate_lang}}</td>
                        
                        <td>
                            <img src={{url($category->photo)}} alt="{{$category->slug}}" style="width:100px;height:100px">
                        </td>

                        <td>
                            <div class="d-flex">
                                <a href="/admin/main-categorie/edit/{{$category->id}}">تعديل</a>
                                <a href="/admin/main-categorie/change/{{$category->id}}">{{$category->active=='1'?'الغاء تفعيل':'تفعيل'}}</a>
                                <a href="/admin/main-categorie/destroy/{{$category->id}}">الحذف</a>
                            </div>
                        </td>

                    </tr>
                     @endforeach
                    
 

             </tbody>
         </table>


    </div>
        



@endsection
    