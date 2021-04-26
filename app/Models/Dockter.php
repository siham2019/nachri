<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dockter extends Model
{
    use HasFactory;
    protected $fillable=['name','gender'];

    public function getGenderAttribute($val){
      return $val=="1"?'female':'male';
    }
    public function setNameAttribute($value){
       $this->attributes['name']=strtoupper($value);
      }
}
