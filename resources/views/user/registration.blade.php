<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>ユーザ登録</title>
		<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
	</head>

	<body>
		<form action="{{route('registrationProcess')}}" method="post">
			@csrf
			<span>ID　　　　　　</span>
			<input type="text" name="userID">
			<br>
			<span>パスワード　　</span>
			<input type="text" name="password">
			<br>
			<span>メールアドレス</span>
			<input type="text" name="email">
			<div class="button-area">
				<button class="active-button" type="submit">登録</button>
				<a class="gray-button" href="{{route('showCalendar')}}">キャンセル</a>
			</div>
		</form>
	</body>
</html>