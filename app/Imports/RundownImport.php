<?php

namespace App\Imports;

use App\Models\Rundown;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class RundownImport implements ToModel, WithCalculatedFormulas
{
    protected $tourId;

    public function __construct($tourId)
    {
        $this->tourId = $tourId;
    }

    public function model(array $row)
    {
        // Konversi serial number Excel menjadi format tanggal yang bisa dibaca
        $date = Date::excelToDateTimeObject($row[0])->format('Y-m-d');

        // Konversi waktu dari format desimal ke format waktu (H:i:s)
        $time = is_numeric($row[1]) ? gmdate('H:i:s', floor($row[1] * 86400)) : null;

        // Ambil timezone, jika tidak ada, gunakan default 'WIB'
        $timezone = !empty($row[2]) ? strtoupper($row[2]) : 'WIB';

        return new Rundown([
            'tour_id' => $this->tourId,
            'date' => $date, // Gunakan tanggal yang sudah dikonversi
            'time' => $time, // Gunakan waktu yang sudah dikonversi
            'timezone' => $timezone, // Gunakan timezone atau default 'WIB'
            'activity' => $row[3], // Ambil aktivitas
            'description' => !empty($row[4]) ? $row[4] : null, // Deskripsi jika ada
        ]);
    }
}
