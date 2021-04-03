<?php
//Carbonを使用するためautoload.phpの読み込み
require_once('/Applications/MAMP/vendor/autoload.php');
//ライブラリを使用
use Carbon\Carbon;

try {
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
} catch (Exception $e) {
  //例外が発生した場合$eに代入されたインスタンスのメソッドを出力して終了
  var_dump($e);
  // echo $e->getMessage();
  exit;
}


?>
<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題09-01</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    <div class="row my-3">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">TODOリスト</div>
          <div class="card-body">
            <form action="./add.php" method="post" class="form-inline">
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
                    <td class="<?php if ($list['is_completed'] == 1) echo 'complete' ?>"><?= $list['expiration_date'] ?></td>
                    <td class="<?php if ($list['is_completed'] == 1) echo 'complete' ?>"><?= $list['todo_item'] ?></td>
                    <td>
                      <form action="./action.php" method="POST" class="form-inline">
                        <input type="hidden" name="id" value="<?= $list['id'] ?>">
                        <div class="form-check form-check-inline mb-3 mr-1">
                          <input type="radio" value="0" name="is_completed" id="is_complete1" class="form-check-input" <?php if ($list['is_completed'] == 0) echo ' checked' ?>>
                          <label for="complete1" class="form-check-label">未完了</label>
                        </div>
                        <div class="form-check form-check-inline mb-3 mr-1">
                          <input type="radio" value="1" name="is_completed" id="is_complete2" class="form-check-input" <?php if ($list['is_completed'] == 1) echo ' checked' ?>>
                          <label for="complete2" class="form-check-label">完了</label>
                        </div>
                        <div class="form-check form-check-inline mb-3 mr-1">
                          <input type="checkbox" value="1" name="delete" id="delete" class="form-check-input">
                          <label for="delete" class="form-check-label">削除</label>
                        </div>
                        <input type="submit" value="実行" class="btn btn-primary mb-3">
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</body>

</html>
