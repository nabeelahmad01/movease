<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMoverLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'zip_from',
        'zip_to',
        'move_date',
        'move_size',
        'name',
        'email',
        'phone',
        'services',
        'message',
    ];

    protected $casts = [
        'services' => 'array',
        'move_date' => 'date',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
