<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAll extends Model
{
    use HasFactory;

    protected $fillable = [
        'nrp',
        'username',
        'department',
        'position',
    ];
}
