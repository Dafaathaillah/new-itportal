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
        'response_time',
        'date_of_complaint',
        'created_date',
        'start_response',
        'start_progress',
        'end_progress',
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
