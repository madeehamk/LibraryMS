<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [

        'title',
        'author',
        'category_id',
        'isbn',
        'published_year',
        'status',
        'cover_image',
        'available_copies',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
