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

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
                $sub->where('title', 'like', "%{$q}%")
                    ->orWhere('excerpt', 'like', "%{$q}%")
                    ->orWhere('body', 'like', "%{$q}%")
                    ->orWhere('category', 'like', "%{$q}%");
            });
        }

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $categories = Post::published()
            ->selectRaw('category, COUNT(*) as total')
            ->groupBy('category')
            ->orderBy('category')
            ->get();

        $posts = $query->latest()->paginate(4)->withQueryString();

        return view('pages.blog', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        $sessionKey = 'post_viewed_' . $post->id;

        if (! session()->has($sessionKey)) {
            PageView::create([
                'url' => request()->url(),
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
            session()->put($sessionKey, true);
        }

        $views = PageView::countFor(request()->url());
        $comments = $post->approvedComments()->get();
        $related = Post::published()
            ->where('category', $post->category)
            ->whereKeyNot($post->id)
            ->latest()
            ->take(3)
            ->get();

        if ($related->count() < 3) {
            $extra = Post::published()
                ->whereKeyNot($post->id)
                ->whereNotIn('id', $related->pluck('id'))
                ->latest()
                ->take(3 - $related->count())
                ->get();

            $related = $related->concat($extra);
        }

        return view('pages.blog-show', compact('post', 'views', 'comments', 'related'));
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

    public function unsubscribeConfirm($email)
    {
        return view('pages.unsubscribe', ['email' => $email]);
    }

    public function unsubscribe($email)
    {
        Subscriber::where('email', $email)->update(['active' => false]);
        return redirect()->route('blog')->with('unsubscribed', true);
    }
}
