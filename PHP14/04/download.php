<?php

// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();

// ログインしていないときは、login.phpへリダイレクト
if (empty($_SESSION['user'])) {
  header('Location: ./login.php');
  exit;
}

// データベース接続と安全対策のためのファイルを読み込む
require_once('./class/config/Config.php');
require_once('./class/db/Base.php');
require_once('./class/db/TodoItems.php');

// トークンが確認できた場合、エラーメッセージを破棄する。
unset($_SESSION['msg']['err']);
try {
  //インスタンスの生成
  $db = new TodoItems();
  // レコードを全件取得する（期限日の古いものから並び替える）
  $lists = $db->selectAll();
} catch (Exception $e) {
  // 例外が発生した場合$eに代入されたインスタンスのメソッドを出力して終了
  var_dump($e);
  exit;
}

// 取得したレコードをCSVファイルとしてダウンロードさせる
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="download.csv"');

foreach ($lists as $list) {
  foreach ($list as $key => $val) {
    // 配列のキーがtodo_itemのとき
    if ($key == 'todo_item') {
      // 文字コードをSJISからUTF-8に変換する
      $list[$key] = mb_convert_encoding($val, 'SJIS-win', 'UTF-8');
    }
  }
  // 配列を「,」で結合して出力する
  echo implode(',', $list) . "\n";
}
