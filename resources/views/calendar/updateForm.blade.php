<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>スケジュール登録</title>
		<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
	</head>

	<body>
		<form action="{{route('updateProcess')}}" method="post">
			@csrf
			<input type="hidden" name="No" value="{{ $schedule->No }}">
			
			<p>日付を入力してください</p>
			<input type="date" name="date" value="{{ $schedule->date }}">
			<p>開始時刻を入力してください</p>
			<input type="time" name="start" value="{{ $schedule->start }}">
			<p>終了時刻を入力してください</p>
			'<input type="time" name="end" value="{{ $schedule->end }}">
			<p>スケジュール内容を入力してください</p>
			<textarea cols="50" rows="5" name="schedule">{{ $schedule->schedule }}</textarea>

			<input type="hidden" name="userID" value={{ $userID }}>

			<div class="form-button">
				<button class="form-next" type="submit">更新</button>
				<a class="form-cancel" href="{{route('showCalendar')}}">キャンセル</a>
			</div>
		</form>
	</body>
</html>