@extends('layouts.app')
@section('content')
<h1>locations_list</h1>
<div class="list-container">
<hr>

@foreach ($lists as $list)
<div class="list-main">
  <p class ="list-item list-title">{{$list->title}}</p>
  <p class ="list-item list-content">{{$list->content}}</p>
  <p class ="list-item list-url">{{$list->url}}</p>
  <div class="edit">
        <a href="{{ url('users/locations/'.$list->id.'/edit') }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
        <form action="{{ route('locations.destroy', [$list->id]) }}" method="post">
          @csrf
          @method('DELETE')
          <input type="submit" value="delete">
        </form>

</div><hr>
@endforeach
</div>
@endsection
