<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvAp extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_name',
        'inventory_number',
        'serial_number',
        'ip_address',
        'device_brand',
        'device_type',
        'device_model',
        'location',
        'status',
        'note',
    ];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->id = self::generateInventoryNumber();
    //     });
    // }

    // public static function generateInventoryNumber()
    // {
    //     $lastItem = self::orderBy('id', 'desc')->first();
    //     $lastId = $lastItem ? $lastItem->id : null;

    //     if ($lastId) {
    //         $number = (int) substr($lastId, 3);
    //         $newNumber = str_pad($number + 1, 3, '0', STR_PAD_LEFT);
    //     } else {
    //         $newNumber = str_pad(1, 3, '0', STR_PAD_LEFT);
    //     }

    //     return 'PPABIBAP' . $newNumber;
    // }
}
