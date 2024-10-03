<?php

namespace App\Imports;

use App\Models\Hotel;
use Maatwebsite\Excel\Concerns\ToModel;

class HotelImport implements ToModel
{
    protected $tourId;

    public function __construct($tourId)
    {
        $this->tourId = $tourId;
    }

    public function model(array $row)
    {
        return new Hotel([
            'tour_id' => $this->tourId,
            'hotel_name' => $row[0],

        ]);
    }
}
