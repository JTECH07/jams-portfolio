<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Subscriber;
use App\Mail\NewPostNotification;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    // ─── Dashboard ───
    public function dashboard()
    {
        $stats = [
            'posts' => Post::count(),
            'comments' => Comment::count(),
            'pending_comments' => Comment::where('approved', false)->count(),
            'subscribers' => Subscriber::where('active', true)->count(),
            'ratings' => \App\Models\Rating::count(),
        ];
        $recentComments = Comment::latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recentComments'));
    }

    // ─── Posts CRUD ───
    public function posts()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function postCreate()
    {
        return view('admin.posts.create', ['categories' => Post::CATEGORIES]);
    }

    public function postStore(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'nullable|max:255',
            'excerpt' => 'required|max:500',
            'body' => 'required',
            'image_file' => 'nullable|image|max:4096',
            'category' => ['required', Rule::in(array_keys(Post::CATEGORIES))],
            'published' => 'nullable',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => $this->uniqueSlug($request->filled('slug') ? $request->slug : $request->title),
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image' => $this->storeImage($request),
            'category' => $request->category,
            'published' => $request->has('published'),
        ]);

        if ($request->has('published')) {
            $subscribers = Subscriber::where('active', true)->get();
            foreach ($subscribers as $sub) {
                Mail::to($sub->email)->send(new NewPostNotification($post));
            }
        }

        return redirect()->route('admin.posts')->with('success', 'Article créé' . ($request->has('published') ? ' et abonnés notifiés.' : '.'));
    }

    public function postEdit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Post::CATEGORIES,
        ]);
    }

    public function postUpdate(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'nullable|max:255',
            'excerpt' => 'required|max:500',
            'body' => 'required',
            'image_file' => 'nullable|image|max:4096',
            'category' => ['required', Rule::in(array_keys(Post::CATEGORIES))],
            'published' => 'nullable',
        ]);

        $image = $post->image;

        if ($request->hasFile('image_file')) {
            $this->deleteImage($post->image);
            $image = $this->storeImage($request);
        }

        $post->update([
            'title' => $request->title,
            'slug' => $request->filled('slug') ? $this->uniqueSlug($request->slug, $post->id) : $post->slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image' => $image,
            'category' => $request->category,
            'published' => $request->has('published'),
        ]);

        return redirect()->route('admin.posts')->with('success', 'Article mis à jour.');
    }

    public function postDelete(Post $post)
    {
        $this->deleteImage($post->image);
        $post->delete();
        return redirect()->route('admin.posts')->with('success', 'Article supprimé.');
    }

    private function uniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $base = Str::slug($value) ?: 'article';
        $slug = $base;
        $suffix = 2;

        while (Post::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
            ->exists()) {
            $slug = $base . '-' . $suffix++;
        }

        return $slug;
    }

    private function storeImage(Request $request): ?string
    {
        if (! $request->hasFile('image_file')) {
            return null;
        }

        $file = $request->file('image_file');
        $base = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) ?: 'article';
        $name = $base . '-' . Str::random(6) . '.' . strtolower($file->getClientOriginalExtension());

        File::ensureDirectoryExists(public_path('images/blog'));
        $file->move(public_path('images/blog'), $name);

        return 'blog/' . $name;
    }

    private function deleteImage(?string $image): void
    {
        if ($image && str_starts_with($image, 'blog/')) {
            $path = public_path('images/' . $image);

            if (is_file($path)) {
                @unlink($path);
            }
        }
    }

    // ─── Comments ───
    public function comments()
    {
        $comments = Comment::latest()->get();
        return view('admin.comments.index', compact('comments'));
    }

    public function commentApprove(Comment $comment)
    {
        $comment->update(['approved' => true]);
        return redirect()->back()->with('success', 'Commentaire approuvé.');
    }

    public function commentDelete(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Commentaire supprimé.');
    }

    // ─── Subscribers ───
    public function subscribers()
    {
        $subscribers = Subscriber::latest()->get();
        return view('admin.subscribers.index', compact('subscribers'));
    }
}
