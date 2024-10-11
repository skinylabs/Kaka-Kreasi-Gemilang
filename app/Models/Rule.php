<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = ['tata_tertib_id', 'content'];

    public function tataTertib()
    {
        return $this->belongsTo(TataTertib::class);
    }
}
