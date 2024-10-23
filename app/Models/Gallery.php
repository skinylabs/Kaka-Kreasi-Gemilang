<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location_id',
    ];

    // app/Models/Gallery.php
    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
