<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'proposal',
        'subject',
        'collab_items',
        'message',
        'is_read',
    ];

    protected $casts = [
        'collab_items' => 'array',
        'is_read' => 'boolean',
    ];
}
