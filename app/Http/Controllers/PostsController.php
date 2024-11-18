<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user','likes'])->latest()->paginate(5);
        return view('post.index', ['posts' => $posts]);
    }

    public function show(Post $post){
        return view('post.show',[
            'post'=> $post
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required']);

        $request->user()->posts()->create($request->only('body'));
        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return back();
    }
}
