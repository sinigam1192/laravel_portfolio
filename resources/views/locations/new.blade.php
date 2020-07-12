@extends('layouts.app')
@section('content')
<h1>location_new</h1>
<form action="/users/locations/" method="POST">
    {{ csrf_field() }}
    <div>
        <label>Title</label><br>
        <input type="text" name="title" />
    </div>
    <div>
        <label>content</label><br>
        <textarea name="content"></textarea>
    </div>
    <div>
        <label>URL</label><br>
        <input type = "text" name="url" / >
    </div>
    <div>
        <input type= "submit" value="Create" />
    </div>
</form>
@endsection
