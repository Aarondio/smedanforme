<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cashflow extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'directin_one',
        'directin_two',
        'directin_three',
        'directin_four',
        'indirectin_one',
        'indirectin_two',
        'indirectin_three',
        'indirectin_four',
        'wages_one',
        'wages_two',
        'wages_three',
        'wages_four',
        'capitalcost_one',
        'capitalcost_two',
        'capitalcost_three',
        'capitalcost_four',
        'businessinfo_id',
    ];

    protected $searchableFields = ['*'];

    public function businessinfo()
    {
        return $this->belongsTo(Businessinfo::class);
    }
}
