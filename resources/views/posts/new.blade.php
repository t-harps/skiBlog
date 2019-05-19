@extends('layout')

@section('title', 'New Post')

@section('content')
  <form method="post" action="/posts" enctype="multipart/form-data">
    <div class="form-group">
        @csrf
        <label for="title">Post title:</label>
        <input type="text" class="form-control" name="title"/>
    </div>
    <div class="form-group">
        <label for="content">Post content :</label>
        <input type="text" class="form-control" name="content"/>
    </div>
    <div class="form-group">
        <label for="postimage">Image:</label>
        <input type="file" class="form-control" name="postimage"/>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="/" class="btn btn-secondary">Cancel</a>
  </form>
  {!! JsValidator::formRequest('App\Http\Requests\postRequest') !!}
@endsection
