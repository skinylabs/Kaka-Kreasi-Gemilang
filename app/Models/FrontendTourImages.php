<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendTourImages extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'path'];

    public function tour()
    {
        return $this->belongsTo(FrontendTour::class, 'tour_id');
    }
}
