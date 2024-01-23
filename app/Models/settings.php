<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_registration',
        'staff_login',
        'plan_approval',
        'allow_visitation',
        'open_portal',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'staff_registration' => 'boolean',
        'staff_login' => 'boolean',
        'plan_approval' => 'boolean',
        'allow_visitation' => 'boolean',
        'open_portal' => 'boolean',
    ];
}
