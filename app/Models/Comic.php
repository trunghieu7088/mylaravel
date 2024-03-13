<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;
    public $timestamps = false;
      public function ComicCoverImage()
    {
    	return $this->hasOne(ComicCoverImage::class,'comic_id','id');
    }
    public function ComicCategory()
    {
    	return $this->belongsTo(ComicCategory::class,'category','id');
    	
    }

    public function getNameComicCategoryNameAttribute()
    {
    	return $this->ComicCategory->name;
    }
     
    protected static function booted()
    {
        static::deleting(function ($comic) {
            $comic->ComicCoverImage->delete();
        });
    }

}
