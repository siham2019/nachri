<?php

namespace App\Http\Controllers;

use App\Models\MainCategorie;
use Illuminate\Http\Request;

class MainCategorieController extends Controller
{

    public function index()
    {
         $categories=MainCategorie::where('translate_lang',getLanguage());
        return view('admin.auth.main_categorie.index',['categories'=>$categories]);
    }
}
