<?php
try {

  //データベースに接続
  $dsn = 'mysql:dbname=php_work2;host=localhost;charset=utf8';

  // PDOクラスのインスタンスを作る
  // 引数は、上記のDSN、データベースのユーザー名、パスワード
  $dbh = new PDO($dsn, 'root', 'root');

  // $_POST['delete']に1の値が送信されてきていた場合
  if (isset($_POST['delete']) && $_POST['delete'] == "1") {

    //該当レコードの削除を実行するsqlの発行
    $sql = "DELETE FROM todo_items WHERE id=:id";

    // SQL文を実行する準備
    $stmt = $dbh->prepare($sql);

    // SQL文の該当箇所に、変数の値を割り当て（バインド）
    $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
  } else {

    //そうでない場合該当レコードの完了、未完了を更新するためのsqlを発行
    $sql = "UPDATE todo_items set is_completed=:is_completed where id=:id";

    // SQL文を実行する準備
    $stmt = $dbh->prepare($sql);

    // SQL文の該当箇所に、変数の値を割り当て（バインド）
    $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
    $stmt->bindValue(':is_completed', $_POST['is_completed'], PDO::PARAM_INT);
  }
  // SQLを実行
  $stmt->execute();

  // 処理が完了したらトップページ（index.php）へリダイレクト
  header('Location: ./');
  exit;
} catch (Exception $e) {
  //例外が発生した場合$eに代入されたインスタンスのメソッドを出力して終了
  var_dump($e);
  // echo $e->getMessage();
  exit;
}
