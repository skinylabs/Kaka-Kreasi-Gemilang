<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rundown extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'date',
        'time',
        'timezone',
        'activity',
        'description',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
