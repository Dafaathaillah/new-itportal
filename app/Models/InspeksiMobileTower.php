<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspeksiMobileTower extends Model
{
    use HasFactory;
    protected $fillable = [
        'inv_mt_id',
        'pica_number',
        'created_date',
        'month',
        'year',
        'inspection_status',
        'inspector',
        'conditions',
        'physic_condition_mobile_tower',
        'physic_condition_mobile_tower_text',
        'battery_circuit',
        'battery_circuit_text',
        'solar_panel',
        'solar_panel_text',
        'device_circuit_output',
        'device_circuit_output_text',
        'list_of_needs',
        'findings',
        'findings_image',
        'findings_action',
        'action_image',
        'findings_status',
        'remarks',
        'due_date',
        'crew',
        'approved_by',
        'status_approval',
    ];
}
