<?php

namespace App\Imports;

use App\Models\InvWirelless;
use Maatwebsite\Excel\Concerns\ToModel;

class WirellessImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function startCell(): string
    {
        return 'B2'; // Mulai dari sel B3, sesuaikan dengan kebutuhanmu
    }

    public function startRow(): int
    {
        return 2; // Mulai dari baris kedua
    }

    public function model(array $row)
    {
        return new InvWirelless([
            'max_id' => 2,
            'device_name' => $row[0],
            'inventory_number' => $row[1],
            'serial_number' => $row[2],
            'ip_address' => $row[3],
            'device_brand' => $row[4],
            'device_type' => $row[5],
            'device_model' => $row[6],
            'location' => $row[7],
            'status' => $row[8],
            'note' => $row[9],
        ]);
    }
}