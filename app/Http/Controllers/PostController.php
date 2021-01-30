<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()
            ->with('user')
            ->withCount('comments')
            ->get()->map(function ($post) {
                $post->setAttribute('added_at', $post->created_at->diffForHumans());
                return $post;
            });
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $comments = $post->comments->map(function ($comment) {
            $comment->setAttribute('user', $comment->user);
            return $comment;
        });

        return response()->json([
            'title' => $post->title,
            'body' => $post->body,
            'slug' => $post->slug,
            'image' => $post->image,
            'added_at' => $post->created_at->diffForHumans(),
            'comments_count' => $comments->count(),
            'category' => $post->category,
            'user' => $post->user,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    /**
     * Search posts according to a query
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->query('query');
        if ($query) {
            $posts = Post::where('title', 'LIKE', '%' . $query . '%')
                ->orWhere('body', 'LIKE', '%' . $query . '%')
                ->with('user')
                ->withCount('comments')
                ->get()->map(function ($post) {
                    $post->setAttribute('added_at', $post->created_at->diffForHumans());
                    return $post;
                });
            return response()->json($posts);
        } else {
            return response()->json([
                'error' => 'No search query provided!'
            ], 400);
        }
    }
}
