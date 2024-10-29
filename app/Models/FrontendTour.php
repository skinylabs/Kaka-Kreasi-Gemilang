<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendTour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'rating',
    ];

    public function images()
    {
        return $this->hasMany(FrontendTourImages::class, 'tour_id');
    }
}
