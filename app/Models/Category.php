<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    //1-nhiều
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
