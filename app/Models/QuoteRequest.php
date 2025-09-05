<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'zip_from','zip_to','move_date','move_size','name','email','phone','status'
    ];
}
