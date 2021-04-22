<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function login(LoginRequest $request)
    {
       if (auth()->guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])) {
           return redirect()->route('dashboard');
       }
       else
         return redirect()->route('login')->withErrors(['message'=>'يرجي التحقق من كلمة المرور او الايميل']);
        
    }
}
