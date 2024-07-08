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
        'month',
        'year',
        'location',
        'root_cause',
        'root_cause_category',
        'status',
        'pic',
        'laptop_loan_id',
    ];
}
