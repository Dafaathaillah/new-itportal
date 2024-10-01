<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvAp extends Model
{
    use HasFactory;

    protected $fillable = [
        'max_id',
        'device_name',
        'inventory_number',
        'serial_number',
        'ip_address',
        'device_brand',
        'device_type',
        'device_model',
        'location',
        'status',
        'note',
    ];
}
