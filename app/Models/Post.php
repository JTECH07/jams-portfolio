<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'excerpt', 'body', 'image', 'category', 'published', 'published_at',
    ];

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public const CATEGORIES = [
        'development' => 'Développement',
        'ia' => 'IA & Automatisation',
        'mobile' => 'Mobile',
        'design' => 'Design',
        'tools' => 'Outils',
        'conseil' => 'Conseil',
    ];

    public function categoryLabel(): string
    {
        return self::CATEGORIES[$this->category] ?? ucfirst((string) $this->category);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('published', true)
            ->where(function ($sub) {
                $sub->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    protected static function booted(): void
    {
        static::deleting(function (Post $post) {
            $post->comments()->delete();
            $post->ratings()->delete();
            PostRedirect::where('post_id', $post->id)->delete();
        });
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function approvedComments()
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->where('approved', true)
            ->latest();
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }

    public function avgRating()
    {
        return round((float) ($this->ratings()->avg('stars') ?? 0), 1);
    }

    public function ratingCount(): int
    {
        return $this->ratings()->count();
    }

    public function totalComments()
    {
        return $this->approvedComments()->count();
    }

    public function readingTime(): int
    {
        $words = str_word_count(strip_tags($this->body ?? ''));

        return max(1, (int) ceil($words / 200));
    }
}
