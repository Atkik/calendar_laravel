<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>スケジュール登録</title>
		<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
	</head>

	<body>
		<form action="{{route('insertProcess')}}" method="post">
			@csrf
			<p>日付を入力してください</p>
			<input type="date" name="date">
			<p>開始時刻を入力してください</p>
			<input type="time" name="start">
			<p>終了時刻を入力してください</p>
			'<input type="time" name="end">
			<p>スケジュール内容を入力してください</p>
			<textarea cols="50" rows="5" name="schedule"></textarea>

			<input type="hidden" name="userID" value="{{ Auth::user()->userID }}">

			<div class="button-area">
				<button class="active-button" type="submit">登録</button>
				<a class="gray-button" href="{{route('showCalendar')}}">キャンセル</a>
			</div>
		</form>
	</body>
</html>