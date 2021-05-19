<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>スケジュール変更</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
</head>

<body>
	<form action="{{route('updateProcess')}}" method="post">
		@csrf
		<input type="hidden" name="No" value="{{ $schedule->No }}">

		<div class="form-group">
			<p class="form-title">スケジュール変更</p>
			<br>
			<p>日付を入力してください</p>
			<input class="form-control" type="date" name="date" value="{{ $schedule->date }}">
			<br>
			<p>開始時刻を入力してください</p>
			<input class="form-control" type="time" name="start" value="{{ $schedule->start }}">
			<br>
			<p>終了時刻を入力してください</p>
			<input class="form-control" type="time" name="end" value="{{ $schedule->end }}">
			<br>
			<p>スケジュール内容を入力してください</p>
			<textarea class="form-control" cols="50" rows="5" name="schedule">{{ $schedule->schedule }}</textarea>
		</div>

		<input type="hidden" name="userID" value={{ $userID }}>

		<div class="button-area">
			<button class="btn btn-primary" type="submit">更新</button>
			<a class="btn btn-secondary" href="{{route('showCalendar')}}" role="button">キャンセル</a>
		</div>
	</form>
</body>

</html>