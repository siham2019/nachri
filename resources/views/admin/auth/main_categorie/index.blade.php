@extends('layout.layout')


@section('title')
   main categories page
@endsection



@section('content')


    <div class="container">
        <a href="/admin/language/add">اضافة القسم الرشيسي</a>
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
                         
                     @endforeach
                     <tr>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td>
                             <div class="d-flex">
                                 <a href="/admin/main-categorie/edit/">تعديل</a>
                                 <a href="/admin/main-categorie/destroy/">الحذف</a>
                             </div>
                         </td>
                     </tr>
 

             </tbody>
         </table>


    </div>
        



@endsection
    