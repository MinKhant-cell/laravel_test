<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('welcome');

//        return $posts->last();
//        return $posts->chunk(4);
//        $collection = collect([
//            [1, 2, 3],
//            [4, 5, 6],
//            [7, 8, 9],
//        ]);
//        The collapse method collapses a collection of arrays into a single, flat collection
//        return $collection->collapse();
//        $concatenated = $posts->concat(['title'=>'Fish']);
//        return $concatenated->all();

//        The contains method determines whether the collection contains a given item.
return collect($posts->first());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('welcome');
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->where('id',$id)->restore();
        return redirect()->route('welcome');
    }
    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('welcome');
    }
}
