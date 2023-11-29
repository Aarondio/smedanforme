<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salesforcast extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'product_id',
        'jan_price',
        'feb_price',
        'mar_price',
        'apr_price',
        'may_price',
        'jun_price',
        'jul_price',
        'aug_price',
        'sep_price',
        'oct_price',
        'nov_price',
        'dec_price',

        'jan_qty',
        'feb_qty',
        'mar_qty',
        'apr_qty',
        'may_qty',
        'jun_qty',
        'jul_qty',
        'aug_qty',
        'sep_qty',
        'oct_qty',
        'nov_qty',
        'dec_qty',
        
        'jan_cost',
        'feb_cost',
        'mar_cost',
        'apr_cost',
        'may_cost',
        'jun_cost',
        'jul_cost',
        'aug_cost',
        'sep_cost',
        'oct_cost',
        'nov_cost',
        'dec_cost',
    ];

    protected $searchableFields = ['*'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
