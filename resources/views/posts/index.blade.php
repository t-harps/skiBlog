@extends('layout')

@section('title', 'Ski Blog')

@section('content')
  <div class="flex-center position-ref full-height">
      @if (Route::has('login'))
          <div class="top-right links">
              @auth
                  <a href="{{ url('/home') }}">Home</a>
              @else
                  <a href="{{ route('login') }}">Login</a>

                  @if (Route::has('register'))
                      <a href="{{ route('register') }}">Register</a>
                  @endif
              @endauth
          </div>
      @endif

      <div class="content">
          <div class="title m-b-md">
              Ski Blog
          </div>
          <div class="newPost">
          	<a href="/posts/new">New Post</a>
          </div>
          <div class="posts">
          	@foreach ($posts as $post)
          		<div class="post">
          			<h3>{{ $post->title }}</h3>
          			<p>{{ $post->content}}</p>
          		</div>
          	@endforeach
      </div>
  </div>
@endsection



