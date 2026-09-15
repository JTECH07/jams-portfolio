<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()->latest()->get();
        return view('pages.blog', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('pages.blog-show', compact('post'));
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'name' => 'nullable|max:255',
        ]);

        Subscriber::updateOrCreate(
            ['email' => $request->email],
            ['name' => $request->name, 'active' => true, 'subscribed_at' => now()]
        );

        return redirect()->route('blog')->with('subscribed', true);
    }
}
