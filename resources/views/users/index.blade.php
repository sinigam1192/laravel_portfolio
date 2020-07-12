		@extends('layouts.app')
		@section('content')
		<h1>こんにちは! {{$user["name"]}}さん!</h1>
    @foreach ($users as $user)
    <hr>
     <h4>{{$user->name}}</h4>
     <h4>{{$user->email}}</h4>
    @endforeach
		<hr>
		@endsection

	</body>
</html>
