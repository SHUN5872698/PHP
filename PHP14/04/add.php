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
require_once('./class/util/SaftyUtil.php');

// ワンタイムトークンのチェック
if (!SaftyUtil::isValidToken($_POST['token'])) {
  // トークンが正しくなかった場合
  // エラーメッセージをセッションに保存して、リダイレクトする
  $_SESSION['msg']['err'] = Config::MSG_INVALID_PROCESS;
  header('Location: ./');
}

// トークンが確認できた場合、エラーメッセージを破棄する。
unset($_SESSION['msg']['err']);

try {

  // todo_itemテーブルクラスのインスタンスを生成する
  $db = new TodoItems();
  // インサートを実行
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
