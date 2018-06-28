@extends('layouts.app')

@section('content')
  <div class="container">

    <form method="POST" action="/news/{{ $news->id }}/update" enctype="multipart/form-data" >
    <input type="hidden" name='id' value="{{ $news->id }}">
      <div class="clearfix">
        <div class="pull-left">
          <div class="lead">
            <strong>Edit News</strong>
            <small>{{ $news->title }}</small>
          </div>
        </div>
        <div class="pull-right">
          <button type="submit" class="btn btn-success">Save</button>
          <a href="/news" class="btn btn-default">Back to list</a>
        </div>
      </div>
      <hr>

      {!! method_field('PUT') !!}
      @include('news.form')
    </form>

  </div>
@endsection
