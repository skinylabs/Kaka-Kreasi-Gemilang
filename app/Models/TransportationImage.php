<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportationImage extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'transportation_id', 'path'];

    // Many images belong to one transportation
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
    public function transportation()
    {
        return $this->belongsTo(Transportation::class);
    }
}
