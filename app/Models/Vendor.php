<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable=[ "full_name",
    "email",
    "password",
    "mobile",
    "adress",
    "active",
    "photo",
    "main_categorie_id"];

    public function categorie()
    {
        return $this->belongsTo('App\Models\MainCategorie','main_categorie_id');
    }
}
