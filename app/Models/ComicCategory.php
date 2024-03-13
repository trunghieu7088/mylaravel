<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComicCategory extends Model
{
    use HasFactory;
    public $timestamps = false;
   // protected $table = 'comic_categories';
    public function category()
    {
    	return $this->hasMany(Comic::class,'id','category');
    }
       public function getNameAttribute($value)
    {
    	//return 'hello '.$value;
    	return strtoupper($value);
    } 
}
