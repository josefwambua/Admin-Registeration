<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // ── Validate ───────────────────────────────────────────────────────
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        // ── Handle image upload ────────────────────────────────────────────
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        // ── Save post ──────────────────────────────────────────────────────
        $post = Post::create($validated);

        // ── Notify admin via email ─────────────────────────────────────────
        $adminEmail = config('mail.admin_email', env('ADMIN_EMAIL'));

        $details = [
            'title'        => $post->title,
            'description'  => $post->description,
            'submitted_by' => auth()->check()
                                ? auth()->user()->name . ' (' . auth()->user()->email . ')'
                                : 'Guest',
            'submitted_at' => now()->format('D, d M Y \a\t H:i A'),
            'view_url'     => route('posts.show', $post->id),
        ];

        Mail::send(
            'emails.new-post-notification',
            $details,
            function ($message) use ($adminEmail, $post) {
                $message->to($adminEmail)
                        ->subject('📬 New Post Submitted: ' . $post->title);
            }
        );

        return redirect()->back()->with('success', 'Your post has been submitted successfully!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}