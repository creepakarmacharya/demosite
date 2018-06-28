@extends('layouts.app')

@section('content')
  <div class="container">

    <form method="POST" action="/news"  enctype="multipart/form-data">

      <div class="clearfix">
        <div class="pull-left">
          <div class="lead">
            <strong>Add News</strong>
          </div>
        </div>
        <div class="pull-right">
          <button type="submit" class="btn btn-success">Save</button>
          <a href="/news" class="btn btn-default">Back to list</a>
        </div>
      </div>
      <hr>

      @include('news.form')
    </form>

  </div>
@endsection
