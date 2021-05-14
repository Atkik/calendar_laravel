<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>ログイン</title>
		<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
	</head>

	<body>
		@if (session('login_error'))
            <div class="flash_message">
				{{ session('login_error') }}
            </div>
        @endif
		<form action="{{route('loginProcess')}}" method="post">
			@csrf
			<span>ID　　　　</span>
			<input type="text" name="userID">
			<br>
			<span>パスワード</span>
			<input type="text" name="password">
			<div class="button-area">
				<button class="active-button" type="submit">ログイン</button>
				<a class="gray-button" href="{{route('showCalendar')}}">キャンセル</a>
			</div>
		</form>
	</body>
</html>