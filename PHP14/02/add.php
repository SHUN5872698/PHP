<?php

// 登録日と項目をサニタイズ
$date = htmlspecialchars($_POST['expiration_date']);
$item = htmlspecialchars($_POST['todo_item']);

//データベースに接続
$dsn = 'mysql:dbname=php_work2;host=localhost;charset=utf8';

// PDOクラスのインスタンスを作る
// 引数は、上記のDSN、データベースのユーザー名、パスワード
$dbh = new PDO($dsn, 'root', 'root');

//データベースに登録日とタスク名をインサート
$sql = "INSERT INTO todo_items(expiration_date, todo_item)VALUES (:expiration_date, :todo_item)";

// SQL文を実行する準備
$stmt = $dbh->prepare($sql);

// SQL文の該当箇所に、変数の値を割り当て（バインド）
$stmt->bindValue(':expiration_date', $date, PDO::PARAM_STR);
$stmt->bindValue(':todo_item', $item, PDO::PARAM_STR);

// SQLを実行
$stmt->execute();

// 処理が完了したらトップページ（index.php）へリダイレクト
header('Location: ./');
exit;