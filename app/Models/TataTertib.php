<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TataTertib extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    public function tours()
    {
        return $this->hasMany(Tour::class, 'tata_tertib_id');
    }

    public function rules()
    {
        return $this->hasMany(Rule::class);
    }
}
