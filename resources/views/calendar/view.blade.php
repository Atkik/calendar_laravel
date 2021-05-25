<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>カレンダー</title>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
</head>

<body>
	@if (session('flash_message'))
	<div class="flash_message">
		{{ session('flash_message') }}
	</div>
	@endif
	@if (session('login_success'))
	<div class="flash_message">
		{{ session('login_success') }}
	</div>
	@endif
	@if (session('logout'))
	<div class="flash_message">
		{{ session('logout') }}
	</div>
	@endif
	<div class="top-wrapper">
		<div class="top-header">
			<img src="{{ asset('image/calenderIcon.png') }}">
			<span>カレンダーアプリ</span>
			<div class="top-header-button">
				@auth
				<span>{{ Auth::user()->userID }}</span>
				<a class="btn btn-primary" href="{{route('logout')}}" role="button">ログアウト</a>
				@endauth
				@guest
				<a class="btn btn-primary" href="{{route('login')}}" role="button">ログイン</a>
				<a class="btn btn-primary" href="{{route('registration')}}" role="button">ユーザ登録</a>
				@endguest
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="schedule-view col-lg-4 order-lg-1 order-sm-2">
					<div class="schedule-view-main">
					</div>
				</div>
				<div class="calendar-view col-lg-8 order-lg-2 order-sm-1">
					<div class="calendar-view-header">
						<div class="month-view">
						</div>
						<input class="insert-schedule-button" type="submit" value="スケジュール新規登録" onclick="location.href='./insert'">
					</div>
					<table border="1" class="calendar-table">
						<tr>
							<th class="sunday">日</th>
							<th class="monday">月</th>
							<th class="tuesday">火</th>
							<th class="wednesday">水</th>
							<th class="thursday">木</th>
							<th class="friday">金</th>
							<th class="saturday">土</th>
						</tr>
					</table>
					<div class="comments">※<span style="color:red">★</span>：予定が登録されている日付</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	var schedules = @json($schedules);
	var userID = @json($userID);
</script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</html>