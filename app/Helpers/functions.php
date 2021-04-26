<?php

use App\Models\Language;
use Illuminate\Support\Facades\Config;

function getLanguage(){
    return Config::get('app.locale');
}


function getActiveLanguage()
{
    return Language::where('active','1')->get();
}