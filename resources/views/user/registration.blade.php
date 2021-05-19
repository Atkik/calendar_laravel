<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>ユーザー登録</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
</head>

<body>
	<form action="{{route('registrationProcess')}}" method="post">
		@csrf
		<div class="form-group">
			<p class="form-title">ユーザー登録</p>
			<br>
			<input class="form-control" type="text" name="userID" placeholder="ユーザーID">
			<br>
			<input class="form-control" type="text" name="password" placeholder="パスワード">
			<br>
			<input class="form-control" type="text" name="email" placeholder="メールアドレス">
		</div>
		<div class="button-area">
			<button class="btn btn-primary" type="submit">登録</button>
			<a class="btn btn-secondary" href="{{route('showCalendar')}}" role="button">キャンセル</a>
		</div>
	</form>
</body>

</html>