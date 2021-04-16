<?php
// 必要なファイルを読み込む
require_once('./class/db/Base.php');
require_once('./class/db/Users.php');
// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();

// フォームから入力した情報をセッションに保存する
$_SESSION['login'] = $_POST;

try {
  // usersテーブルクラスのインスタンスを生成する。
  $db = new Users();

  // ログイン情報からユーザーを検索
  $user = $db->getUser($_POST['email'], $_POST['password']);

  // ユーザー情報が確認できなかった場合
  if (empty($user)) {
    // エラーメッセージをセッションに保存してログインページへリダイレクト
    $_SESSION['err_msg'] = 'メールアドレス、または、パスワードに誤りがあります。';
    header('Location: ./login.php');
    exit;
  }

  // ユーザー情報が確認できた場合
  // ユーザー情報をセッションに保存する
  $_SESSION['user'] = $user;

  // エラーメッセージを破棄してindex.phpへリダイレクトして終了
  unset($_SESSION['err_msg']);
  header('Location: ./');
  exit;
} catch (Exception $e) {
  // 例外が発生した場合、$eに代入されたインスタンスのメソッドを出力して終了
  // var_dump($e);
  // echo $e->getMessage();
  // 例外が発生した場合、エラーメッセージをセッションに保存して、リダイレクトする。
  $_SESSION['err_msg'] = '申し訳ございません。エラーが発生しました。';
  header('Location: ./user_add.php');
  exit;
}
