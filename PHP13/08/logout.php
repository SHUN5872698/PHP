<?php
// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();

// セッションに保存されているユーザー情報を削除する
unset($_SESSION['user']);
// ログインページへリダイレクト
header('Location: ./login.php');
exit;
