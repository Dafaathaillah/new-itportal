<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvLaptop extends Model
{
    use HasFactory;

    protected $fillable = [
        'laptop_name',
        'laptop_code',
        'number_asset_ho',
        'assets_category',
        'spesifikasi',
        'serial_number',
        'aplikasi',
        'license',
        'ip_address',
        'date_of_inventory',
        'date_of_deploy',
        'location',
        'status',
        'condition',
        'note',
        'link_documentation_asset_image',
        'users_id',
    ];
}
