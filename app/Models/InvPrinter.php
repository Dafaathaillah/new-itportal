<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvPrinter extends Model
{
    use HasFactory;

    protected $fillable = [
        'printer_code',
        'serial_number',
        'ip_address',
        'item_name',
        'printer_brand',
        'printer_type',
        'location',
        'date_of_inventory',
        'status',
        'note',
        'division',
        'department',
    ];
}
