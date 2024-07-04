<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'complaint_code',
        'complaint_image',
        'inventory_number',
        'date_of_complaint',
        'start_response',
        'start_progress',
        'respons_time',
        'category_name',
        'complaint_note',
        'complaint_name',
        'complaint_position',
        'phone_number',
        'nrp',
        'location',
        'detail_location',
        'repair_note',
        'repair_image',
        'status',
        'root_cause',
        'action_repair',
        'crew',
    ];
}
