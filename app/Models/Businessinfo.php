<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Businessinfo extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'business_name',
        'user_id',
        'audience_need',
        'business_model',
        'target_market',
        'competition_ad',
        'management_team',
        'plan_type',
        'loan_amount',
        'loan_reason',

        'emp_no',


        // 'business_type',
        'register_type',
        'is_registered',
        'suin',
        'business_age',
        // 'register_year',
        'sector',
        'address',
        'business_no',
        'status',
   

    ];


    protected $searchableFields = ['*'];
    // protected $hidden = [
    //     'id'
    // ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cashlows()
    {
        return $this->hasMany(Cashflow::class);
    }
    public function salesforcast(){
        return $this->hasMany(Product::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
