<?php


use Illuminate\Support\Facades\Config;

function getLanguage(){
    return Config::get('app.locale');
}