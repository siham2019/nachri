@extends('layout.layout')


@section('title')
   main categories page
@endsection



@section('content')


    <div class="container">
        <a href="/admin/vendors/add">اضافة التاجر </a>
        @include('alert.success')
        @include('alert.error')
        <table border="1">
             <thead>
                 <th>اسم التاجر</th>
                 <th>الحالة</th>
                 <th>اسم القسم الرشيسي</th>
                 <th>الصورة</th>
                 <th>الاجراءات</th>
             </thead>
             <tbody>

                     @foreach ($vendors as $vendor)
                     <tr>
                        <td>{{$vendor->full_name}}</td>
                        <td>{{$vendor->active}}</td>
                      
                        <td>{{$vendor->categorie->name}}</td>
                        
                        <td>
                            <img src={{url($vendor->photo)}} alt="{{$vendor->slug}}" style="width:100px;height:100px">
                        </td>

                        <td>
                            <div class="d-flex">
                                <a href="/admin/vendors/edit/{{$vendor->id}}">تعديل</a>
                                <a href="/admin/vendors/destroy/{{$vendor->id}}">الحذف</a>
                            </div>
                        </td>

                    </tr>
                     @endforeach
                    
 

             </tbody>
         </table>


    </div>
        



@endsection
    