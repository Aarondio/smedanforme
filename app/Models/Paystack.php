<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paystack extends Model
{
    use HasFactory;

    protected $fillable = ['reference', 'user_id','plan_type','year'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
