<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['tour_id', 'hotel_name'];

    // One Hotel has many images
    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }
}
