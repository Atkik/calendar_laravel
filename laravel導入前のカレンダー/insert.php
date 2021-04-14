<?php

//データベース接続用の情報を代入
$dbname='test_database';
$dsn = 'mysql:dbname='.$dbname.';host=localhost';
$user = 'root';
$password = 'root';
	
try{
    $dbh = new PDO($dsn, $user, $password);
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

//データ挿入SQL文
$sql = 'INSERT INTO '.$dbname.'.schedule (date, start, end, schedule) VALUES (:date, :start, :end, :schedule)';
//実行準備
$stmt = $dbh -> prepare($sql);

$stmt -> bindValue(':date', $_POST['date']);
$stmt -> bindValue(':start', $_POST['start']);
$stmt -> bindValue(':end', $_POST['end']);
$stmt -> bindValue(':schedule', $_POST['schedule']);

//sqlを実行
$stmt -> execute();

$dbh = null;

?>