<?php
// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();

//エラー時のメッセージ
$msg = 'アップロードに失敗しました。';

// $_FILESが存在しない、もしくは、アップロード時にエラーが発生したとき
if (!isset($_FILES['csv_file']) || $_FILES['csv_file']['error'] > 0) {
  // セッションにエラーメッセージを保存
  $_SESSION['err']['msg'] = $msg;
  // アップロードページにリダイレクトして終了
  header('Location: ./upload/php');
  exit;
}

// セッションのエラーメッセージを破棄
unset($_SESSION['err']['msg']);

// アップロードされたCSVファイルを開く
$fp = fopen($_FILES['csv_file']['tmp_name'], 'r');

try {
  // データベースに接続するための文字列（DSN 接続文字列）
  $dsn = 'mysql:dbname=php_work2;host=localhost;charset=utf8';

  // PDOクラスのインスタンスを作る
  // 引数は、上記のDSN、データベースのユーザー名、パスワード
  // XAMPPの場合はデフォルトでパスワードなし、MAMPの場合は「root」
  $dbh = new PDO($dsn, 'root', 'root');

  // エラーが起きたときのモードを指定する
  // 「PDO::ERRMODE_EXCEPTION」を指定すると、エラー発生時に例外がスローされる
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // レコードをアップデートするSQL文
  $sql = "UPDATE todo_items set expiration_date=:expiration_date, todo_item=:todo_item, is_completed=:is_completed where id=:id";

  // SQL文を実行する準備
  $stmt = $dbh->prepare($sql);

  // 開いたCSVファイルを1行ずつ読み込む
  while (($buf = fgetcsv($fp)) !== false) {

    // $bufにはCSVから読み込んだ項目が配列として代入されている
    $stmt->bindValue(':id', $buf['0'], PDO::PARAM_INT);
    $stmt->bindValue(':expiration_date', $buf['1'], PDO::PARAM_STR);
    $stmt->bindValue(':todo_item', mb_convert_encoding($buf[2], 'UTF-8', 'SJIS'), PDO::PARAM_STR);
    $stmt->bindValue(':is_completed', $buf['3'], PDO::PARAM_INT);

    // SQLを実行する
    $stmt->execute();
  }

  // トップページへリダイレクトする
  header('Location: ./');
  exit;
} catch (Exception $e) {
  // 例外が発生した場合、エラーメッセージをセッションに保存
  $_SESSION['err']['msg'] = $msg;
  // アップロードページにリダイレクトして終了
  header('Location: ./upload.php');
  exit;
}
