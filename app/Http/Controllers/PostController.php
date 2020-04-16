<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\User;

// use Illuminate\Http\Request;
use App\Http\Requests\RoleReuest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function list(){
        $posts = Post::with(['user', 'tags'])->get();

        return response()->json([ 
            'posts' => $posts
            ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $posts = Post::all();

            return view('index', [ 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleReuest $request)
    {
        $text = $request->text;

        $post = new Post();
        $post->post = $text;

        $post->user_id = Auth::user()->id;
        // dd($post->user_id);

        $post->save();

        $tag = $request->selectTag;
        $post->tags()->attach($tag);

        $index = "toey";
        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $tags = $post->tags()->get();
        
        $comments = $post->comments()->get();

        return view('show',['post' => $post, 'tags' => $tags , 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(!$post->can_manage)
        {
            return redirect()->route('posts.index');
        }
        $tags = Tag::all();
        return view('edit',['post' => $post ,'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(RoleReuest $request, Post $post)
    {
        $uptext = $request->get('text');
        $post->post = $uptext;
        $post->save();

        $uptags = $request->get('selectTag');
        $post->tags()->sync($uptags);

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
