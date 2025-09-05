<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BottomMover extends Model
{
    protected $fillable = [
        'company_id','page','heading','availability','position','deposit_required','point_one','point_two','point_three','content'
    ];

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
}
