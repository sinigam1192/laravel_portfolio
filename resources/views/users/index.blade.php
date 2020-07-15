		@extends('layouts.app')
		@section('content')
		<h3>こんにちは! {{$user["name"]}}さん!</h3>

		<div class="explanation">
			このWebサイトは自分の好きな場所を保存できます。<br>
			<a href="/users/locations/new">早速location登録してみましょう！</a>
			<br>
			<a href="/users/locations/list">今まで登録したlocationはこちら</a>
		</div>
@endsection
