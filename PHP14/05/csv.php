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

// エラーメッセージを破棄する。
unset($_SESSION['msg']['err']);

try {
  //インスタンスの生成
  $db = new TodoItems();
  // レコードを全件取得する（期限日の古いものから並び替える）
  $lists = $db->selectAll();
} catch (Exception $e) {
  // 例外が発生した場合エラーメッセージをセッションに保存してエラーページにリダイレクト
  $_SESSION['msg']['err'] = Config::MSG_EXCEPTION;
  header('Location: ./error.php');
  exit;
}
// CSVファイルを書き込みモードで開く
$fp = fopen('./csv/todo.csv', 'w');

// 書き込みが成功か失敗かを判定する変数を作成
$b = true;

// CSVファイルを書き込みモードで開く
// 関数の前に「@」をつけることでエラーが表示されなくなります（対応していない関数もあります）。
if (!$fp = @fopen('./csv/todo.csv', 'w')) {
  $b = false;
} else {
  // 文字列をSJIS-winに変換して、ファイルに書き込む
  foreach ($lists as $val) {
    foreach ($val as $k => $v) {
      if ($k == 'todo_item') {
        $val[$k] = mb_convert_encoding($v, 'SJIS', 'UTF-8');
      }
    }
    // 書き込みに失敗した場合$bの中身をfalseに上書きする
    if (
      fputcsv($fp, $val, ',', '"') === false
    ) {
      $b = false;
      break;
    }
  }
}

// メッセージを変数に代入
if ($b) {
  $msg = '書き込みが完了しました。';
} else {
  $msg = '書き込みに失敗しました。';
}
?>
<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題14-05</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center mt-3">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <p><?= $msg ?></p>
            <a href="./">もどる</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>