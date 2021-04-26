<?php

namespace App\Models;

use App\Scopes\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable=['name','active','direction','abbr'];
    

    public function scopeActiveCount($query)
    {
        return $query->where('active','1')->count();
    }
 /*    protected static function booted()
    {
        static::addGlobalScope(new Scopes);
    }
 */
}
