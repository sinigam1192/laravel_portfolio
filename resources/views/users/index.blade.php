<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
</head>
	<body>
		<h1>こんにちは! {{$name}}!</h1>
    @foreach ($users as $user)
    <hr>
     <h4>{{$user->name}}</h4>
     <h4>{{$user->email}}</h4>
     <hr>
    @endforeach
	</body>
</html>
 コメントの内容
