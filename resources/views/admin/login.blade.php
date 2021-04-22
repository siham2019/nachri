@extends('layout.layout')


@section('title')
    admin login
@endsection

@section('extra-css')
<link rel="stylesheet" href="{{url('style.css')}}">
@endsection

@section('content')



        
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first py-2 text-info">
         <h1>Admin Login</h1>
    </div>

    <!-- Login Form -->
    <form action="/admin/login" method="POST">
      @csrf
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="email">
      @error('email')
          <p class="alert alert-danger">{{$message}}</p>
      @enderror
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      @error('password')
          <p class="alert alert-danger">{{$message}}</p>
      @enderror
      @if (session('errors'))
          <p>{{ session('errors')->first('message') }}</p>
      @endif
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>







@endsection
    