<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\MorphTo;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['author_name', 'author_email', 'stars', 'review', 'rateable_type', 'rateable_id'];

    protected $casts = ['stars' => 'integer'];

    public function rateable(): MorphTo
    {
        return $this->morphTo();
    }
}
