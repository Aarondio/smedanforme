<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'businessinfo_id',
        'ceo',
        'pro_manager',
        'workers',
        'marketers',
        'other_employees',
    ];

    public function businessinfo(){
        return $this->belongsTo(Businessinfo::class);
    }
}
