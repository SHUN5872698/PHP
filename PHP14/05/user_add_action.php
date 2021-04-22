<?php
// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();

// データベース接続と安全対策のためのファイルを読み込む
require_once('./class/config/Config.php');
require_once('./class/db/Base.php');
require_once('./class/db/TodoItems.php');
require_once('./class/util/SaftyUtil.php');

// ワンタイムトークンのチェック
if (!SaftyUtil::isValidToken($_POST['token'])) {
  // エラーメッセージをセッションに保存して、リダイレクトする
  $_SESSION['msg']['err']  = Config::MSG_INVALID_PROCESS;
  header('Location: ./user_add.php');
  exit;
}

// フォームから入力した情報をセッションに保存する
$_SESSION['login'] = $_POST;

try {
  // usersテーブルクラスのインスタンスを生成する。
  $db = new Users();

  // レコードのインサート
  $ret = $db->addUser($_POST['email'], $_POST['password'], $_POST['name']);

  if (!$ret) {
    // 登録処理が上手くいかなかった場合
    // エラーメッセージをセッションに保存して、リダイレクトする
    $_SESSION['msg']['err']  = Config::MSG_USER_DUPLICATE;
    header('Location: ./user_add.php');
    exit;
  }

  // 正常終了したときは、ログイン情報とエラーメッセージを破棄して、index.phpにリダイレクトする。
  unset($_SESSION['login']);
  unset($_SESSION['msg']['err']);
  header('Location: ./login.php');
  exit;
} catch (Exception $e) {
  // 例外が発生した場合エラーメッセージをセッションに保存してエラーページにリダイレクト
  $_SESSION['msg']['err'] = Config::MSG_EXCEPTION;
  header('Location: ./error.php');
  exit;
}
