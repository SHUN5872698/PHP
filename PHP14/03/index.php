<?php

// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();

//Carbonを使用するためautoload.phpの読み込み
require_once('/Applications/MAMP/vendor/autoload.php');
//ライブラリを使用
use Carbon\Carbon;

// 今日の日付のCarbonクラスのインスタンスを生成。
$now = Carbon::now('Asia/Tokyo');
//現在時刻をフォーマット
$now = $now->format('Y-m-d');

// データベースに接続
$dsn = 'mysql:dbname=php_work2;host=localhost;charset=utf8';
// PDOクラスのインスタンスを作る
// 引数は、上記のDSN、データベースのユーザー名、パスワード
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

// ワンタイムトークンを生成してセッションに保存する
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] = $token;
?>
<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題14-03</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <style>
    #expiration_date {
      width: 12rem;
    }

    #todo_item {
      width: 25rem;
    }

    .complete {
      text-decoration: line-through;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center mt-3">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">TODOリスト</div>
          <div class="card-body">
            <?php if (isset($_SESSION['err_msg'])) : ?>
              <div class="alert alert-danger" role="alert">
                <?= $_SESSION['err_msg'] ?>
              </div>
            <?php endif ?>
            <form action="./add.php" method="post" class="form-inline">
              <input type="hidden" name="token" value="<?= $token ?>">
              <div class="form-group mb-3 mr-1">
                <label for="expiration_date" class="sr-only">期限日</label>
                <input type="date" name="expiration_date" value="<?= $now ?>" id="expiration_date" class="form-control">
              </div>
              <div class="form-group mb-3 mr-1">
                <label for="todo_item" class="sr-only">TODO項目</label>
                <input type="text" name="todo_item" placeholder="TODO項目を入力してください" id="todo_item" class="form-control">
              </div>
              <input type="submit" value="追加" class="btn btn-primary mb-3">
            </form>
            <?php if (count($lists) > 0) { ?>
              <table class="table table-borderd">
                <tr>
                  <th>期限日</th>
                  <th>TODO項目</th>
                  <th></th>
                </tr>
                <?php foreach ($lists as $list) { ?>
                  <tr>
                    <td><?= $list['expiration_date'] ?></td>
                    <td><?= $list['todo_item'] ?></td>
                  </tr>
                <?php } ?>
              </table>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
