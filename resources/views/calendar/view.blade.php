<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>カレンダー</title>
		<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
		
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	</head>
	
	<body>
		<div class="top-wrapper">
			<div class="schedule-view">
				<span>スケジュール</span>
				<div class="schedule-view-main">
				</div>
			</div>
			<div class="calendar-view">
				<div class="month-view">
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
			</div>
		</div>
	</body>
	<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</html>	