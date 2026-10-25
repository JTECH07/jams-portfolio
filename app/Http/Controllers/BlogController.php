<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterConfirmation;
use App\Models\PageView;
use App\Models\Post;
use App\Models\PostRedirect;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

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

        $posts = $query->orderByDesc('published_at')->orderByDesc('id')->paginate(4)->withQueryString();

        return view('pages.blog', compact('posts', 'categories'));
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (! $post) {
            $redirect = PostRedirect::where('slug', $slug)->first();
            abort_unless($redirect && $redirect->post, 404);

            return redirect()->route('blog.show', $redirect->post->slug, 301);
        }

        $isLive = $post->published
            && (! $post->published_at || ! $post->published_at->isFuture());

        abort_unless($isLive || auth()->check(), 404);

        $sessionKey = 'post_viewed_'.$post->id;

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
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        if ($related->count() < 3) {
            $extra = Post::published()
                ->whereKeyNot($post->id)
                ->whereNotIn('id', $related->pluck('id'))
                ->orderByDesc('published_at')
                ->orderByDesc('id')
                ->take(3 - $related->count())
                ->get();

            $related = $related->concat($extra);
        }

        return view('pages.blog-show', compact('post', 'views', 'comments', 'related'));
    }

    public function subscribe(Request $request)
    {
        if ($request->filled('website')) {
            return redirect()->route('blog')->with('subscribe_pending', true);
        }

        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'name' => 'nullable|max:255',
            'consent' => 'accepted',
        ], [], ['consent' => 'consentement']);

        $subscriber = Subscriber::firstOrNew(['email' => $validated['email']]);
        $subscriber->name = $validated['name'] ?? $subscriber->name;

        if ($subscriber->exists && $subscriber->isConfirmed()) {
            return redirect()->route('blog')->with('subscribed', true);
        }

        $subscriber->fill([
            'active' => false,
            'confirmed_at' => null,
            'subscribed_at' => now(),
        ])->save();

        $url = URL::temporarySignedRoute(
            'blog.subscribe.confirm',
            now()->addDays(7),
            ['subscriber' => $subscriber->id]
        );

        Mail::to($subscriber->email)->queue(new NewsletterConfirmation($subscriber, $url));

        return redirect()->route('blog')->with('subscribe_pending', true);
    }

    public function confirmSubscription(Request $request, Subscriber $subscriber)
    {
        $subscriber->update([
            'active' => true,
            'confirmed_at' => now(),
        ]);

        return redirect()->route('blog')->with('subscribed', true);
    }

    public function unsubscribeConfirm(Subscriber $subscriber)
    {
        return view('pages.unsubscribe', [
            'subscriber' => $subscriber,
            'email' => $subscriber->email,
            'unsubscribeUrl' => URL::temporarySignedRoute(
                'blog.unsubscribe.post',
                now()->addDay(),
                ['subscriber' => $subscriber->id]
            ),
        ]);
    }

    public function unsubscribe(Request $request, Subscriber $subscriber)
    {
        $subscriber->update(['active' => false]);

        return redirect()->route('blog')->with('unsubscribed', true);
    }
}
