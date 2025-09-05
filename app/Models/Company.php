<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Company extends Model
{
    protected $fillable = [
        'user_id','name','slug','email','phone','website','address_line1','address_line2','city','state_id','country_id','zip','description','status','rating','logo','dot_number','mc_number','license_number','service_type','is_active','is_claimed','claimed_by_user_id'
    ];

    // Automatically generate slug when creating/updating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($company) {
            if (empty($company->slug)) {
                $company->slug = Str::slug($company->name);
            }
        });

        static::updating(function ($company) {
            if ($company->isDirty('name') && empty($company->slug)) {
                $company->slug = Str::slug($company->name);
            }
        });
    }

    public function owner(): BelongsTo { return $this->belongsTo(User::class,'user_id'); }
    public function state(): BelongsTo { return $this->belongsTo(State::class); }
    public function country(): BelongsTo { return $this->belongsTo(Country::class); }
    public function claims(): HasMany { return $this->hasMany(CompanyClaim::class); }
    public function reviews(): HasMany { return $this->hasMany(Review::class); }

    public function averageRating(): float
    {
        $avg = $this->reviews()->where('status','approved')->avg('rating');
        return $avg ? round((float)$avg, 1) : 0.0;
    }
}
