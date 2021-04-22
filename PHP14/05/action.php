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
  // 例外が発生した場合エラーメッセージをセッションに保存してエラーページにリダイレクト
  $_SESSION['msg']['err'] = Config::MSG_EXCEPTION;
  header('Location: ./error.php');
  exit;
}
