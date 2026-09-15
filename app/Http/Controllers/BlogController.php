<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subscriber;
use App\Models\PageView;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::published();

        if ($request->has('q') && $request->q !== '') {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
                $sub->where('title', 'like', "%{$q}%")
                    ->orWhere('excerpt', 'like', "%{$q}%")
                    ->orWhere('body', 'like', "%{$q}%")
                    ->orWhere('category', 'like', "%{$q}%");
            });
        }

        $posts = $query->latest()->get();
        return view('pages.blog', compact('posts'));
    }

    public function show(Post $post)
    {
        PageView::create([
            'url' => request()->url(),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $views = PageView::countFor(request()->url());
        return view('pages.blog-show', compact('post', 'views'));
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
