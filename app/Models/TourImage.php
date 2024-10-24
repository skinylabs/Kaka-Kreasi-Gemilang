<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourImage extends Model
{
    use HasFactory;

    protected $fillable = ['image_path', 'image_tag', 'tour_id'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
