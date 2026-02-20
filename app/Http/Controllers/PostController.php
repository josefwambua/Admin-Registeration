<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Show the public form
    public function create()
    {
        return view('posts.create');
    }

    // Handle form submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload image
        $imagePath = $request->file('image')->store('posts', 'public');

        // Create post
        Post::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.create')
            ->with('success', 'Post submitted successfully!');
    }
}