<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspeksiLaptop extends Model
{
    use HasFactory;

    protected $fillable = [
        'inv_laptop_id',
        'pica_number',
        'condition',
        'created_date',
        'inspection_at',
        'year',
        'inspection_status',
        'inspector',
        'software_defrag',
        'software_check_system_restore',
        'software_clean_cache_data',
        'software_check_ilegal_software',
        'software_change_password',
        'software_windows_license',
        'software_office_license',
        'software_standaritation_software',
        'software_update_sinology',
        'software_turn_off_windows_update',
        'software_cheking_ssd_health',
        'software_standaritation_device_name',
        'hardware_fan_cleaning',
        'hardware_change_pasta',
        'hardware_any_maintenance',
        'hardware_any_maintenance_explain',
        'findings',
        'findings_image',
        'findings_action',
        'action_image',
        'findings_status',
        'remarks',
        'due_date',
        'inventory_status',
        'approved_by',
        'status_approval',
    ];

    public function inventory()
    {
        return $this->belongsTo(InvLaptop::class, 'inv_laptop_id', 'id');
    }
}
