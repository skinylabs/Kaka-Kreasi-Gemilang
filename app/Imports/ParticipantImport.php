<?php

namespace App\Imports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ParticipantImport implements ToModel, WithCalculatedFormulas
{
    protected $tourId;

    public function __construct($tourId)
    {
        $this->tourId = $tourId;
    }

    public function model(array $row)
    {

        // dd($row);

        return new Participant([
            'name' => trim($row[0]),
            'gender' => trim($row[1]),
            'group' => trim($row[2]),
            'room_code' => trim($row[3]),
            'transportation_slug' => trim($row[4]),
            'tour_id' => $this->tourId,
        ]);
    }
}
