<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvMobileTower extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'inventory_number',
        'mt_code',
        'type_mt',
        'location',
        'detail_location',
        'gps',
        'led_lamp',
        'condition',
        'status',
        'note',
        'padlock_code',
    ];
}
