<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComicCoverImage extends Model
{
    use HasFactory;
    public $timestamps = false;
    //protected $table = 'comic_cover_images';
    public function comic()
    {
        return $this->belongsTo(Comic::class);
    }
  
}
