<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'name', 'active', 'subscribed_at'];

    protected $casts = [
        'active' => 'boolean',
        'subscribed_at' => 'datetime',
    ];
}
