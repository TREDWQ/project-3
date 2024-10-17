<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validatepost();
        
        Post::create([

            'title' => request('title'),
    
            'body' => request('body'),
    
            'author' => request('author'),
    
        ]);
    
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        $comments = $post->comments()->where('approved', 1)->get();
        return view('posts.show', compact(['post', 'comments']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(post $post)
    {
        $this->validatepost();

        $post->update([
            'title' => request('title'),
            'body' => request('body'),
            'author' => request('author')
        ]);
        return redirect('/posts/'. $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function validatepost()
    {
      request()->validate([
            'title' => ['required','unique:posts','max:100'],
            'body' => 'required',
            'author' => 'required'

        ]);  
    }
}


