<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'featured_image',
        'category_id',
        'content',
        'published_at',
        'user_id',
    ];

    // Blog belongs to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Blog belongs to BlogCategory
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}
