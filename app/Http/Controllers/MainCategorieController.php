<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainCategorieRequest;
use App\Models\MainCategorie;
use Illuminate\Http\Request;

class MainCategorieController extends Controller
{

    public function index()
    {
         $categories=MainCategorie::where('translate_lang',getLanguage())->get();
        return view('admin.auth.main_categorie.index',['categories'=>$categories]);
    }

    public function create()
    {
              
               return view('admin.auth.main_categorie.add',['languages'=> getActiveLanguage()]);

    }

     public function store(MainCategorieRequest $request)
     {
        dd($request->all());
     }









}
