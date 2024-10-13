<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts'=>$posts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'description' => ['string', 'required'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/posts/', $filename);
            $img_path = 'storage/posts/' . $filename;
        }else{
            $img_path = null;
        }


        Post::create([
            'description' => $request->description,
            'image' => $img_path,
            'user_id' => Auth::id()
        ]);

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // এখানে $post এ post id পাবার কথা কিন্তু আমি ঐ id এর post টাই পেয়ে যাচ্ছি কেন বুঝলাম না ভাই 
        $showPost = Post::with('user')->findOrFail($post->id);
        return view('show', data: ['post'=>$showPost]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // এখানে $post এ post id পাবার কথা কিন্তু আমি ঐ id এর post টাই পেয়ে যাচ্ছি কেন বুঝলাম না ভাই 
        $showPost = Post::with('user')->findOrFail($post->id);
        return view('edit', data: ['post'=>$showPost]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $request->validate([
            'description' => ['string', 'required']
        ]);

        $post->update($request->all());

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return back();
    }
}
