<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Subscriber;
use App\Models\Subscriber;
use App\Mail\NewPostNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // ─── Dashboard ───
    public function dashboard()
    {
        $stats = [
            'posts' => Post::count(),
            'comments' => Comment::count(),
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
        return view('admin.posts.create');
    }

    public function postStore(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required|max:500',
            'body' => 'required',
            'image' => 'nullable|max:255',
            'category' => 'required|max:100',
            'published' => 'nullable',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image' => $request->image,
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
        return view('admin.posts.edit', compact('post'));
    }

    public function postUpdate(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required|max:500',
            'body' => 'required',
            'image' => 'nullable|max:255',
            'category' => 'required|max:100',
            'published' => 'nullable',
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image' => $request->image,
            'category' => $request->category,
            'published' => $request->has('published'),
        ]);

        return redirect()->route('admin.posts')->with('success', 'Article mis à jour.');
    }

    public function postDelete(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts')->with('success', 'Article supprimé.');
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
