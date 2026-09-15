<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Rating;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(Request $request)
    {
        $request->validate([
            'author_name' => 'required|max:255',
            'author_email' => 'nullable|email|max:255',
            'body' => 'required|max:1000',
            'commentable_type' => 'required|in:post',
            'commentable_id' => 'required|integer',
        ]);

        Comment::create([
            'author_name' => $request->author_name,
            'author_email' => $request->author_email,
            'body' => $request->body,
            'commentable_type' => 'App\\Models\\Post',
            'commentable_id' => $request->commentable_id,
        ]);

        return redirect()->back()->with('commented', true);
    }

    public function storeRating(Request $request)
    {
        $request->validate([
            'author_name' => 'required|max:255',
            'author_email' => 'nullable|email|max:255',
            'stars' => 'required|integer|min:1|max:5',
            'review' => 'nullable|max:500',
            'rateable_type' => 'required|in:post,service',
            'rateable_id' => 'required|integer',
        ]);

        $type = match($request->rateable_type) {
            'post' => 'App\\Models\\Post',
            default => 'App\\Models\\Post',
        };

        Rating::create([
            'author_name' => $request->author_name,
            'author_email' => $request->author_email,
            'stars' => $request->stars,
            'review' => $request->review,
            'rateable_type' => $type,
            'rateable_id' => $request->rateable_id,
        ]);

        return redirect()->back()->with('rated', true);
    }
}
