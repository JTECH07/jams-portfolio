<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'name', 'active', 'subscribed_at', 'confirmed_at'];

    protected $casts = [
        'active' => 'boolean',
        'subscribed_at' => 'datetime',
        'confirmed_at' => 'datetime',
    ];

    public function isConfirmed(): bool
    {
        return $this->active && $this->confirmed_at !== null;
    }
}
