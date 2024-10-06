<?php

namespace App\Imports;

use App\Models\TataTertib;
use Maatwebsite\Excel\Concerns\ToModel;

class TataTertibImport implements ToModel
{
    protected $tourId;

    public function __construct($tourId)
    {
        $this->tourId = $tourId;
    }

    public function model(array $row)
    {
        return new TataTertib([

            'title' => $row[0],
            'rule' => $row[1],

        ]);
    }
}
