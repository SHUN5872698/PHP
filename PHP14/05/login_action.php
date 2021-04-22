<?php

// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();

// 必要なファイルを読み込む
require_once('./class/config/Config.php');
require_once('./class/db/Base.php');
require_once('./class/db/Users.php');
require_once('./class/util/SaftyUtil.php');

// ワンタイムトークンのチェック
if (!SaftyUtil::isValidToken($_POST['token'])) {
  // トークンが正しくなかった場合
  // エラーメッセージをセッションに保存して、リダイレクトする
  $_SESSION['msg']['err'] = Config::MSG_INVALID_PROCESS;
  header('Location: ./');
  exit;
}

// ログインの情報をセッションに保存する
$_SESSION['login'] = $_POST;

try {
  // ユーザーテーブルクラスのインスタンスを生成する
  $db = new Users();

  // ログイン情報からユーザーを検索
  $user = $db->getUser($_POST['email'], $_POST['password']);

  // ログイン不可のとき
  if (empty($user)) {
    // エラーメッセージをセッションに保存して、リダイレクトする
    $_SESSION['msg']['err']  = Config::MSG_USER_LOGIN_FAILURE;
    header('Location: ./login.php');
    exit;
  }

  // ユーザー情報をセッションに保存する
  $_SESSION['user'] = $user;

  // エラーメッセージを削除して、index.phpにリダイレクト
  unset($_SESSION['msg']['err']);
  header('Location: ./');
  exit;
} catch (Exception $e) {
  // 例外が発生した場合エラーメッセージをセッションに保存してエラーページにリダイレクト
  $_SESSION['msg']['err'] = Config::MSG_EXCEPTION;
  header('Location: ./error.php');
  exit;
}
