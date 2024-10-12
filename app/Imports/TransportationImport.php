<?php

namespace App\Imports;

use App\Models\Transportation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class TransportationImport implements ToModel, WithCalculatedFormulas
{
    protected $tourId;

    public function __construct($tourId)
    {
        $this->tourId = $tourId;
    }

    public function model(array $row)
    {
        // Buat slug berdasarkan transportation_name
        $slug = strtolower(str_replace(' ', '-', $row[0]));

        return new Transportation([
            'tour_id' => $this->tourId,
            'transportation_name' => $row[0],
            'slug' => $slug,
        ]);
    }
}
