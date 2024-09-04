<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory, SoftDeletes;

    // Update the $fillable array with video-related fields
    protected $fillable = [
        'title',          // Renamed from 'name' to 'title' for videos
        'slug',
        'thumbnail',      // Could still be relevant for videos
        'url',            // New field specific for video URL
        'description',    // New field specific for video description
        'category_id',
        'author_id',
        'is_featured',
    ];

    // Update the setter method to work with the 'title' attribute
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Define the relationship to the Category model
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Define the relationship to the Author model
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
    
}