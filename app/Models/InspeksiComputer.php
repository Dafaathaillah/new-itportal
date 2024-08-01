<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspeksiComputer extends Model
{
    use HasFactory;

    protected $fillable = [
        'inv_computer_id',
        'pica_number',
        'created_date',
        'month',
        'year',
        'inspection_status',
        'triwulan',
        'inspector',
        'conditions',
        'physique_condition_cpu',
        'physique_condition_monitor',
        'software_license',
        'software_standaritation',
        'software_clear_cache',
        'software_system_restore',
        'defrag',
        'hard_maintenance',
        'crew',
        'findings',
        'findings_image',
        'findings_action',
        'action_image',
        'findings_status',
        'remarks',
        'due_date',
        'inventory_status',
        'ip_address',
        'location',
        'approved_by',
        'status_approval',
    ];
}
