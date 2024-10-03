<?php

namespace App\Imports;

use App\Models\Rundown;
use Maatwebsite\Excel\Concerns\ToModel;

class RundownImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rundown([
            //
        ]);
    }
}
