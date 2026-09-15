<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\MorphTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['author_name', 'author_email', 'body', 'commentable_type', 'commentable_id', 'approved'];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
