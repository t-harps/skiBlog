@extends('layout')

@section('title', 'New Post')

@section('content')

  <form method="post" action="/posts">
    <div class="form-group">
        @csrf
        <label for="title">Post title:</label>
        <input type="text" class="form-control" name="title"/>
    </div>
    <div class="form-group">
        <label for="content">Post content :</label>
        <input type="text" class="form-control" name="content"/>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>

@endsection
