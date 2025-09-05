<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BestMovingPage extends Model
{
    // Allow mass assignment for form fields used in controller
    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_keywords',
        'page_name',
        'slug',
        'published_at',
        'navbar_content',
        'upper_content',
        'review_content',
        'lower_content',
    ];
}
