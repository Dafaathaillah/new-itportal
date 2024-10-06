<?php

namespace App\Imports;

use App\Models\InvAp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportAp implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function startCell(): string
    // {
    //     return 'B1'; // Mulai dari sel B3, sesuaikan dengan kebutuhanmu
    // }

    public function startRow(): int
    {
        return 17; // Mulai dari baris kedua
    }

    public function model(array $row)
    {
        // dd($row[0]);
        return new InvAp([
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
