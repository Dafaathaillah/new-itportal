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
            'max_id' => $row[0],
            'device_name' => $row[1],
            'inventory_number' => $row[2],
            'serial_number' => $row[3],
            'ip_address' => $row[4],
            'device_brand' => $row[5],
            'device_type' => $row[6],
            'device_model' => $row[7],
            'location' => $row[8],
            'status' => $row[9],
            'note' => $row[10],
        ]);
    }
}
