<?php
// データベース接続のためのファイルを読み込む
require_once('./class/db/Base.php');
require_once('./class/db/TodoItems.php');

try {

  // todo_itemテーブルクラスのインスタンスを生成する
  $db = new TodoItems();

  // $_POST['delete']に1の値が送信されてきていた場合
  if (isset($_POST['delete']) && $_POST['delete'] == "1") {

    // レコードを削除する
    $db->delete($_POST['id']);
  } else {
    //そうでない場合該当レコードの完了、未完了を更新
    $db->updateIsCompletedByID($_POST['id'], $_POST['is_completed']);
  }

  // 処理が完了したらトップページ（index.php）へリダイレクト
  header('Location: ./');
  exit;
} catch (Exception $e) {
  //例外が発生した場合$eに代入されたインスタンスのメソッドを出力して終了
  var_dump($e);
  // echo $e->getMessage();
  exit;
}
