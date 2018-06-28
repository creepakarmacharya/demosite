@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="clearfix">
      <div class="pull-left">
        <div class="lead">News <br/>
         @if(Session::has('message'))
    {{Session::get('message')}}
    @endif
    </div>
      </div>
      <div class="pull-right">
        <a href="/news/add" class="btn btn-success">Add new</a>
      </div>
    </div>

    <hr>
   
    <table class="table table-bordered table-hover table-striped">
      <thead>
      <tr>
        <th class="col-xs-1">
          ID
          
        </th>
        <th class="col-xs-3">
          News title
          
        </th>
        <th class="col-xs-3">
          Last modified
          
        </th>
        <th class="col-xs-2">
          Action
        </th>
      </tr>
      </thead>
      <tbody>
      @foreach($pages as $page)
        <tr>
          <td>{{ $page->id }}</td>
          <td>
            <a href="/news/{{ $page->id }}">{{ $page->title }}</a>
          </td>
          <td>
            <time class="timeago" datetime="{{ $page->updated_at->toIso8601String() }}"
                  title="{{ $page->updated_at->toDayDateTimeString() }}">
              {{ $page->updated_at->diffForHumans() }}
            </time>
          </td>
          <td  >
            <div class="input-group-btn">
              <a href="{{ route('news.edit', $page->id) }}" class="btn btn-primary">Edit</a>
              <a href="{{ route('news.delete', $page->id) }}" class="btn btn-danger"
                 onclick="return confirm('Are you sure to delete this news?');">
                Delete
              </a>
            </div>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>

    <div class="text-center">
      {!! $pages->appends(request()->except('news'))->links() !!}
    </div>

  </div>
@endsection
