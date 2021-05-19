<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>スケジュール削除</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
</head>

<body>
	<form action="{{route('deleteProcess')}}" method="post">
		@csrf
		<input type="hidden" name="No" value="{{ $schedule->No }}">

		<div class="form-group">
			<p class="form-title">スケジュール削除</p>
			<br>
			<table border="1">
				<tr>
					<td class="td-item">日付</td>
					<td class="td-content">{{ $schedule->date }}</td>
				</tr>
				<tr>
					<td class="td-item">開始時刻</td>
					<td class="td-content">{{ $schedule->start }}</td>
				</tr>
				<tr>
					<td class="td-item">終了時刻</td>
					<td class="td-content">{{ $schedule->end }}</td>
				</tr>
				<tr>
					<td class="td-item">内容</td>
					<td class="td-content">{{ $schedule->schedule }}</td>
				</tr>
			</table>
			<br>
			<p>上記のスケジュールを削除しますか？</p>
		</div>
		<div class="button-area">
			<button class="btn btn-primary" type="submit">削除</button>
			<a class="btn btn-secondary" href="{{route('showCalendar')}}" role="button">キャンセル</a>
		</div>
	</form>
</body>

</html>