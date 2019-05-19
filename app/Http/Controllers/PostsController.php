<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Post;
use App\Http\Requests;

class PostsController extends Controller
{
    public function index() {
    	$posts = Post::all();
    	return view('posts.index', compact('posts'));
    }

    public function new() {
    	$post = new Post();
    	return view('posts.new', compact('post'));
    }

    public function create(Requests\postRequest $request) {
    	$post = new Post();

    	$postimage = $request->file('postimage');
    	if ($postimage) {
    		$extension = $postimage->getClientOriginalExtension();
    		Storage::disk('public')->put($postimage->getFilename().'.'.$extension,  File::get($postimage));
    		$post->mime = $postimage->getClientMimeType();
    		$post->original_filename = $postimage->getClientOriginalName();
    		$post->filename = $postimage->getFilename().'.'.$extension;
    	}

    	$post->title = request("title");
    	$post->content = request("content");
    	$post->save();

    	return redirect ('/');
    }

    public function show($id) {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id) {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id) {
        $post = Post::find($id);

        $postimage = $request->file('postimage');
        if ($postimage) {
            $extension = $postimage->getClientOriginalExtension();
            Storage::disk('public')->put($postimage->getFilename().'.'.$extension,  File::get($postimage));
            $post->mime = $postimage->getClientMimeType();
            $post->original_filename = $postimage->getClientOriginalName();
            $post->filename = $postimage->getFilename().'.'.$extension;
        }

        $post->title = request("title");
        $post->content = request("content");
        $post->save();

        return redirect ('/');
    }

}
