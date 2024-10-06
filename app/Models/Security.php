<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'security_password'];

    // Definisikan relasi ke model Tour
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
