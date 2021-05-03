<?php

namespace App\Models;

use App\Observers\MainCategorieObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategorie extends Model
{
    use HasFactory;
    protected $fillable=["active"];

    protected static function boot()
    {
        parent::boot();
        MainCategorie::observe(MainCategorieObserver::class);
    }
     public function scopeGetActive($query){
      
        return  $query->where('translate_lang',getLanguage())->where('active',"1")->get();

     }

    public function scopeActiveCount($query)
    {
        return $query->where('translate_lang',getLanguage())->where('active',"1")->count();
    }

    public function categories()
    {
            return $this->hasMany(self::class,'translater_of');
    }

    public function vendors()
    {
        return $this->hasMany('App\Models\Vendor','main_categorie_id');
    }


}
