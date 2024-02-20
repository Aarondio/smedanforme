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
        'ceo',
        'pro_manager',
        'workers',
        'marketers',
        'other_employees',



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

        // 'year',
        // 'salary',
        // 'securities',
        // 'rent',
        // 'utilities',
        // 'depreciation',
        // 'adminexpenses',
        // 'marketing',
        // 'supplies',
        // 'licences',
        // 'consultation',
        // 'internet',
        // 'legal',
        // 'miscell' ,
        // 'insurance',
        // 'other_expenses',


        'about',
        'slogan',
        'mission',
        'journey',
        'website',
        'email',
        'phone',
        'business_model',

        'strength',
        'weakness',
        'opportunity',
        'threats',
        'approval',

        'capital',
        'debt',
        'loan',

       
        'lands',
        'plants',
        
        'cash',
        'cashown',
        'intangible',
        'inventory',
        'raw_start',
        'raw_end',
        'tax',

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
    public function salesforcast()
    {
        return $this->hasMany(Product::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expenses::class);
    }

    public function employees()
    {
        return $this->belongsTo(Employees::class);
    }
}
