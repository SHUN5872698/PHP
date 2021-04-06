<?php
try {
  // データベースに接続するための文字列（DSN 接続文字列）
  $dsn = 'mysql:dbname=php_work2;host=localhost;charset=utf8';

  // PDOクラスのインスタンスを作る
  // 引数は、上記のDSN、データベースのユーザー名、パスワード
  // XAMPPの場合はデフォルトでパスワードなし、MAMPの場合は「root」
  $dbh = new PDO($dsn, 'root', 'root');

  // エラーが起きたときのモードを指定する
  // 「PDO::ERRMODE_EXCEPTION」を指定すると、エラー発生時に例外がスローされる
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // レコードを全件取得する（期限日の古いものから並び替える）
  $sql = 'select * from todo_items order by expiration_date';

  // SQL文を実行する準備
  $stmt = $dbh->prepare($sql);

  // SQLを実行する
  $stmt->execute();

  // 取得したレコードを連想配列として変数に代入する
  $lists = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  // 例外が発生した場合$eに代入されたインスタンスのメソッドを出力して終了
  var_dump($e);
  exit;
}

// 取得したレコードをCSVファイルとしてダウンロードさせる
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="downloaded.csv"');

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
