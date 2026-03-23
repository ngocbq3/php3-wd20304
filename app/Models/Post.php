<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'view',
        'category_id',
    ];

    //Nhiều - 1
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
