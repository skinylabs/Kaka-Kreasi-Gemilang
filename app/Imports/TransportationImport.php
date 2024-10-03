<?php

namespace App\Imports;

use App\Models\Transportation;
use Maatwebsite\Excel\Concerns\ToModel;

class TransportationImport implements ToModel
{
    protected $tourId;

    public function __construct($tourId)
    {
        $this->tourId = $tourId;
    }

    public function model(array $row)
    {
        return new Transportation([
            'tour_id' => $this->tourId,
            'transportation_name' => $row[0],
        ]);
    }
}
