<?php

namespace App\Imports;

use App\Models\InvSwitch;
use Maatwebsite\Excel\Concerns\ToModel;

class SwitchImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startCell(): string
    {
        return 'A17'; // Mulai dari sel B3, sesuaikan dengan kebutuhanmu
    }

    public function startRow(): int
    {
        return 17; // Mulai dari baris kedua
    }

    public function model(array $row)
    {
        dd($row);
        return new InvSwitch([
            'max_id' => $row[0],
            'device_name' => $row[1],
            'inventory_number' => $row[2],
            'serial_number' => $row[3],
            'ip_address' => $row[4],
            'mac_address' => $row[5],
            'device_brand' => $row[6],
            'device_type' => $row[7],
            'device_model' => $row[8],
            'location' => $row[9],
            'status' => $row[10],
            'note' => $row[11],
        ]);
    }
}
