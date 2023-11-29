<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'cost',
        'businessinfo_id'
    ];

    protected $searchableFields = ['*'];

    public function businessinfo()
    {
        return $this->belongsTo(Businessinfo::class);
    }

    public function salesforcasts()
    {
        return $this->hasMany(Salesforcast::class);
    }
}
