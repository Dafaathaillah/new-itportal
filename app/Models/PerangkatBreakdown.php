<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatBreakdown extends Model
{
    use HasFactory;
    protected $fillable = [
        'device_category',
        'inventory_number',
        'device_name',
        'start_progress',
        'end_progress',
        'created_date',
        'month',
        'year',
        'location',
        'root_cause',
        'root_cause_category',
        'garansion_laptop_code',
        'status',
        'pic',
    ];
}
