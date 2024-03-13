<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    public $timestamps = false;
   
     //  protected $casts = [
      //  'content' => 'array',
   // ];
    public function getFullStatusAttribute()
    {
    	return 'day la id : '.$this->id.'+ status :  '.$this->status;
    }
    public function getFullContentAttribute()
    {
    	return json_decode($this->content);
    }
}
