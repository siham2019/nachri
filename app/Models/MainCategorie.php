<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategorie extends Model
{
    use HasFactory;
    public function scopeActiveCount($query)
    {
        return $query->where('translate_lang',getLanguage())->where('active',1)->count();
    }
}
