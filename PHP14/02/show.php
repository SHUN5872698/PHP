<?php
//データベースに接続
$dsn = 'mysql:dbname=php_work2;host=localhost;charset=utf8';

// PDOクラスのインスタンスを作る
// 引数は、上記のDSN、データベースのユーザー名、パスワード
$dbh = new PDO($dsn, 'root', 'root');

// 検索日からレコードを検索するためのSQL文
$sql = "select * from todo_items where expiration_date=:date''order by id";

//SQL文の実行準備
$stmt = $dbh->prepare($sql);
// SQL文の該当箇所に、変数の値を割り当て（バインド）
$stmt->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
// SQL文の実行
$stmt->execute();
// 連想配列でレコードを取得
$lists = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題14-02</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <style>
    #expiration_date {
      width: 12rem;
    }

    #todo_item {
      width: 25rem;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center mt-3">
      <div class="col-8">
        <div class="card">
          <div class="card-header">検索結果一覧</div>
          <div class="card-body">
            <?php
            if (empty($lists)) { ?>
              <table class="table table-boderderd">
                <tr>
                  <th>該当するデータはありません</th>
                </tr>
              </table>
            <?php } else { ?>
              <table class="table table-boderderd">
                <tr>
                  <th>期限日</th>
                  <th>TODO項目</th>
                </tr>
                <?php foreach ($lists as $list) { ?>
                  <tr>
                    <td><?= $list['expiration_date'] ?></td>
                    <td><?= $list['todo_item'] ?></td>
                  </tr>
                <?php } ?>
              <?php } ?>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
