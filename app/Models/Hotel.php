<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['tour_id', 'hotel_name'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    // public function participants()
    // {
    //     return $this->hasMany(Participant::class);
    // }
}
