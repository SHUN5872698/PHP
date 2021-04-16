<?php
// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();

// データベース接続のためのファイルを読み込む
require_once('./class/db/Base.php');
require_once('./class/db/TodoItems.php');

unset($_SESSION['user']);
// ログインしていないときは、login.phpへリダイレクト
if (empty($_SESSION['user'])) {
  header('Location: ./login.php');
  exit;
}
try {

  // todo_itemテーブルクラスのインスタンスを生成する
  $db = new TodoItems();
  // レコードを全件取得する（期限日の古いものから並び替える）
  $db->insert($_POST['expiration_date'], $_POST['todo_item']);
  // 処理が完了したらトップページ（index.php）へリダイレクト
  header('Location: ./');
  exit;
  //
} catch (Exception $e) {
  //例外が発生した場合$eに代入されたインスタンスのメソッドを出力して終了
  var_dump($e);
  // echo $e->getMessage();
  exit;
}
