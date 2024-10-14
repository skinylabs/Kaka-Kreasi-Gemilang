<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'client', 'slug', 'start_date', 'end_date', 'tata_tertib_id', 'user_id', 'security_password'];

    // Sebelum menyimpan model, buat slug dari nama
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tour) {
            // Membuat slug dari nama dengan format yang sesuai
            $tour->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $tour->name)));

            // Jika tata_tertib_id tidak diisi, ambil dari tata tertib default
            if (empty($tour->tata_tertib_id)) {
                $defaultTataTertib = TataTertib::where('is_default', true)->first();
                if ($defaultTataTertib) {
                    $tour->tata_tertib_id = $defaultTataTertib->id; // Set tata_tertib_id ke ID default
                } else {
                    throw new \Exception('No default tata tertib found.');
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function transportations()
    {
        return $this->hasMany(Transportation::class);
    }

    public function rundown()
    {
        return $this->hasOne(Rundown::class);
    }

    public function tataTertib()
    {
        return $this->belongsTo(TataTertib::class, 'tata_tertib_id');
    }
}
