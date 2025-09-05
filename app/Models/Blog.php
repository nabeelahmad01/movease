<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    protected $fillable = [
        'title','slug','meta_title','meta_keywords','meta_description','featured_image','category_id','content','published_at','user_id'
    ];

    public function category(): BelongsTo { return $this->belongsTo(BlogCategory::class,'category_id'); }
    public function author(): BelongsTo { return $this->belongsTo(User::class,'user_id'); }
    public function faqs(): HasMany { return $this->hasMany(BlogFaq::class); }
}
