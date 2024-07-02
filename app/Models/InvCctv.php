<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvCctv extends Model
{
    use HasFactory;

    protected $fillable = [
        'cctv_code',
        'location',
        'location_detail',
        'cctv_name',
        'cctv_brand',
        'cctv_model',
        'type_cctv',
        'mac_address',
        'ip_address',
        'nvr_id',
        'switch_id',
        'date_of_inventory',
        'vlan',
        'status',
        'note',
        'last_status_ping',
        'last_update_ping',
    ];
}
