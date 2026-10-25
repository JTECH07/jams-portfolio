<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostRedirect extends Model
{
    protected $fillable = ['slug', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
