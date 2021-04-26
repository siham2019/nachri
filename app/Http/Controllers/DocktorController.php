<?php

namespace App\Http\Controllers;

use App\Models\Dockter;
use Illuminate\Http\Request;

class DocktorController extends Controller
{
    public function get()
    {
       return Dockter::all();
    }
    
    public function store()
    {
        Dockter::create([
           'gender'=>"1",
            'name'=>"ggfffff"
        ]);
        return true;
    }


}
