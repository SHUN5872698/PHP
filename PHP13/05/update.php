<?php

// データベース接続のためのファイルを読み込む
require_once('./class/db/Base.php');
require_once('./class/db/TodoItems.php');
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
  // インスタンス生成
  $db = new TodoItems();

  // 開いたCSVファイルを1行ずつ読み込む
  while (($buf = fgetcsv($fp)) !== false) {

    // アップデート実行
    // $bufにはCSVから読み込んだ項目が配列として代入されている
    $db->update($buf[0], $buf[1], mb_convert_encoding($buf[2], 'UTF-8', 'SJIS-win'), $buf[3]);
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
