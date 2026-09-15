<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    protected $fillable = ['url', 'ip', 'user_agent'];

    public static function countFor(string $url): int
    {
        return static::where('url', $url)->count();
    }
}
