@extends('layout')

@section('title', 'Update Post')

@section('content')
  {{ Form::model($post, array('enctype' => 'multipart/form-data', 'method' => 'PUT', 'action' => array('PostsController@update', $post->id))) }}
    <div class="form-group">
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', $post->title, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('content', 'Content:') }}
      {{ Form::text('content', $post->content, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('postimage', 'Image:') }}
      {{ Form::file('postimage', array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Save changes', array('class' => 'btn btn-primary')) }}
    <a href="/" class="btn btn-secondary">Cancel</a>
  {{ Form::close() }}
@endsection
