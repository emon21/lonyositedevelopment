<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];


    # Relationship

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }


    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
