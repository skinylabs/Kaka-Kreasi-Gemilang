<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'path'];

    // Many images belong to one transportation
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
