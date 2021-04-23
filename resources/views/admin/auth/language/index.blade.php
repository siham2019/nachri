@extends('layout.layout')


@section('title')
   language page
@endsection



@section('content')


    <div class="container">
        <a href="/admin/language/add">اضافة اللغة</a>
        @include('alert.success')
        @include('alert.error')
        <table>
             <thead>
                 <th>اسم اللغة</th>
                 <th>الحالة</th>
                 <th>الجهة</th>
                 <th>الاجراءات</th>
             </thead>
             <tbody>

                 @foreach ($languages as $language)
                     <tr>
                         <td>{{$language->name}}</td>
                         <td>{{$language->active}}</td>
                         <td>{{$language->direction}}</td>
                         <td>
                             <div class="d-flex">
                                 <a href="/admin/language/edit/{{$language->id}}">تعديل</a>
                                 <a href="/admin/language/destroy/{{$language->id}}">الحذف</a>
                             </div>
                         </td>
                     </tr>
                 @endforeach

             </tbody>
         </table>


    </div>
        



@endsection
    