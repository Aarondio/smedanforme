<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $fillable = [
        'businessinfo_id',
        'year',
        'expense_type',
        'salary',
        'securities',
        'rent',
        'website',
        'utilities',
        'depreciation',
        'adminexpenses',
        'marketing',
        'supplies',
        'licences',
        'consultation',
        'internet',
        'legal',
        'miscell',
        'insurance',
        'others',
    ];

    public function businessinfo(){
      return  $this->belongsTo(Businessinfo::class);
    }
}
