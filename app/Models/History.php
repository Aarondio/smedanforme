<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'action',
        'description',
        'staff_id',
        'businessinfo_id'
 
    ];

    protected $dates = ['created_at', 'updated_at'];


    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    // $table->string('action');
    // $table->string('description');
    // $table->string('performed_by');
    // $table->string('business_plan');
    // $table->timestamps();
}
