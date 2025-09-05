<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TopMover extends Model
{
    protected $fillable = [
        'company_id','page','heading','phone','position','point_one','point_two','point_three','status','expires_at'
    ];

    protected $casts = [ 'expires_at' => 'datetime' ];

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
}
