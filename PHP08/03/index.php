<?php
//Carbonを使用するためautoload.phpの読み込み
require_once('/Applications/MAMP/vendor/autoload.php');
//ライブラリを使用
use Carbon\Carbon;

// 今日の日付のCarbonクラスのインスタンスを生成。
$now = Carbon::now('Asia/Tokyo');
//現在時刻をフォーマット
$now = $now->format('Y-m-d');
?>

<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題08-03</title>
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
    <div class="row justify-content-md-center mt-3">
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
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
