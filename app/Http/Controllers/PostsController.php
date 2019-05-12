<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

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

    public function create() {
    	$post = new Post();
    	$post->title = request("title");
    	$post->content = request("content");
    	$post -> save();

    	return redirect ('/');
    }
}
