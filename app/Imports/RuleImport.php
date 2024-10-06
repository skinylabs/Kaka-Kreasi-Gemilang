<?php

namespace App\Imports;

use App\Models\Rule;
use Maatwebsite\Excel\Concerns\ToModel;

class RuleImport implements ToModel
{
    protected $tataTertibId;

    public function __construct($tataTertibId)
    {
        $this->tataTertibId = $tataTertibId;
    }

    public function model(array $row)
    {
        return new Rule([
            'tata_tertib_id' => $this->tataTertibId,
            'content' => $row[0],
        ]);
    }
}
