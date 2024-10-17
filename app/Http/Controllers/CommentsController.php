<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storcommentmake;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\comment;


class CommentsController extends Controller
{
    public function store(Storcommentmake $request, post $post)
    
    {

        comment::create([

            'name' => request('name'),
            'body' => request('body'),
            'post_id' => $post->id
        ]);

        return back();

    }
}
