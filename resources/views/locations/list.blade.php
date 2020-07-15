@extends('layouts.app')
@section('content')

<div class="container">
  <h1>locations_list</h1>

<div class="table-responsive-md">
<table class="table">
  <thead>
    <tr>
      <th scope="col">title</th>
      <th scope="col">content</th>
      <th scope="col">edit</th>
      <th scope="col">delete?</th>
    </tr>
  </thead>
@foreach ($lists as $list)
  <tbody>
    <tr>
      <td>{{$list->title}}</td>
      <td>{{$list->content}}</td>
      <td><a href="{{ url('users/locations/'.$list->id.'/edit') }}" class="btn btn-primary">
          {{ __('Edit') }}
      </a></td>
      <td><form action="{{ route('locations.destroy', [$list->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <input class="btn btn-danger" type="submit" value="delete">
      </form></td>
    </tr>
  </tbody>
@endforeach
</table>
</div>
</div>
@endsection
