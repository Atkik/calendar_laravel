<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>ログイン</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
</head>

<body>
	@if (session('login_error'))
	<div class="flash_message">
		{{ session('login_error') }}
	</div>
	@endif
	<form action="{{route('loginProcess')}}" method="get">
		@csrf
		<div class="form-group">
			<p class="form-title">ログイン</p>
			<br>
			<input class="form-control" type="text" name="userID" placeholder="ユーザーID">
			<br>
			<input class="form-control" type="text" name="password" placeholder="パスワード">
		</div>
		<div class="button-area">
			<button class="btn btn-primary" type="submit">ログイン</button>
			<a class="btn btn-secondary" href="{{route('showCalendar')}}" role="button">キャンセル</a>
		</div>
	</form>
</body>

</html>