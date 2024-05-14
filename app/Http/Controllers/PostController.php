<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Post\BaseController;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::find(1);
        // $tags = Tag::find(1);
        // dd($tags->posts);
        // $category = Category::find(1);
         // dd($category->posts);
        // $categories = Category::all();
        // dd($categories);
        //$posts = Post::where('category_id', $category->id)->get();
        $posts = Post::all();
       
         return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $postarr = [
        //     [
        //         'title' => 'title of post phpstorm',
        //         'content' => 'some interesting content',
        //         'image' => 'imageblabla.jpg',
        //         'likes' => 20,
        //         'is_published' => 1,
        //     ],
        //     [
        //         'title' => 'another of post phpstorm',
        //         'content' => 'some interesting content',
        //         'image' => 'imageblabla.jpg',
        //         'likes' => 50,
        //         'is_published' => 1,
        //     ],
        // ];

        // foreach ($postarr as $item)
        // {
        //     Post::create($item);
        // }
        //  dd('created');
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'string', 
            'post_content' => 'string', 
            'image' => 'string',
            'category_id' => '', 
            'tags' => '',    
        ]);
        
        $this->service->store($data);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post','categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string', 
            'post_content' => 'string', 
            'image' => 'string',   
            'category_id' => '', 
            'tags' => '',    
        ]);
        
        $this->service->update($post, $data);
        return redirect()->route('post.show', $post->id)->with('success', 'Сообщение было обновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Сообщение было удалено');
    }
}
