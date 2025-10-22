<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'author_id',
        'name',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class,'author_id');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
}
