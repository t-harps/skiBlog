@extends('layout')

@section('title', 'Ski Blog')

@section('content')
  <div class="row justify-content-md-center">
    <a href="/posts/new" class="col-2 btn btn-primary">New Post</a>
  </div>
</br>
  <div class="posts row">
  	@foreach ($posts as $post)
      <div class="card col-12">
        @if ($post->filename) 
          <img class="card-img-top" src="{{url('uploads/'.$post->filename)}}" alt="{{$post->filename}}">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">{{ $post->content}}</p>
          <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
        </div>
      </div>
  	@endforeach
  </div>
@endsection



