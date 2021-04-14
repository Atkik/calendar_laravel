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
$sql = 'DELETE FROM '.$dbname.'.schedule WHERE No = :dataNo';
//実行準備
$stmt = $dbh -> prepare($sql);

$stmt -> bindValue(':dataNo', $_POST['dataNo']);

//sqlを実行
$stmt -> execute();

$dbh = null;

?>