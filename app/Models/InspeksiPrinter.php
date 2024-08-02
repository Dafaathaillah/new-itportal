<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspeksiPrinter extends Model
{
    use HasFactory;

    protected $fillable = [
        'inv_printer_id',
        'pica_number',
        'condition',
        'created_date',
        'inspection_at',
        'month',
        'year',
        'inspection_status',
        'inspector',
        'tinta_cyan',
        'tinta_magenta',
        'tinta_yellow',
        'tinta_black',
        'body_condition',
        'usb_cable_condition',
        'power_cable_condition',
        'performing_physical_power_cleaning',
        'performing_cleaning_on_the_printer_waste_box',
        'performing_cleaning_head',
        'performing_print_quality_test',
        'do_replacing_cable',
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
}
