<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Post;
use App\Http\Requests\postRequest;
use App\Services\Posts\UpdateAttributesService;

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

    public function create(postRequest $request) {
        $post = new Post();

        $UpdateAttributesService = new UpdateAttributesService();
        $UpdateAttributesService->update($request, $post);

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

        $UpdateAttributesService = new UpdateAttributesService();
        $UpdateAttributesService->update($request, $post);

        return redirect ('/');
    }

}
