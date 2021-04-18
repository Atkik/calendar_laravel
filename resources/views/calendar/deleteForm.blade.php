<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>スケジュール更新</title>
		<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
	</head>

	<body>
		<form action="{{route('deleteProcess')}}" method="post">
			@csrf
			<input type="hidden" name="No" value="{{ $schedule->No }}">
			<table border="1">
				<tr>
					<th>日付</th>
					<th>開始時刻</th>
					<th>終了時刻</th>
					<th>内容</th>
				</tr>
				<tr>
					<td>{{ $schedule->date }}</td>
					<td>{{ $schedule->start }}</td>
					<td>{{ $schedule->end }}</td>
					<td>{{ $schedule->schedule }}</td>
			</table>
			<br>
			<p>上記のスケジュールを削除しますか？</p>
			<div class="form-button">
				<button class="form-next" type="submit">削除</button>
				<a class="form-cancel" href="{{route('showCalendar')}}">キャンセル</a>
			</div>
		</form>
	</body>
</html>