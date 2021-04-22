@extends('layout.layout')


@section('title')
    user login
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
         <h1>User Login</h1>
    </div>

    <!-- Login Form -->
    <form>
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="email">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>







@endsection
    