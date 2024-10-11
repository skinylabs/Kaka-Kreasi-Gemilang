<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'group',
        'room_code',
        'tour_id',              // Foreign key for tours
        'transportation_slug',    // Foreign key for transportation
    ];

    public function tour()
    {
        return $this->hasOne(Tour::class);
    }

    public function transportation()
    {
        return $this->belongsTo(Transportation::class, 'transportation_slug', 'slug');
    }
}
