<?php
// Carbonを使用するためautoload.phpの読み込み
require_once('/Applications/MAMP/vendor/autoload.php');
// ライブラリを使用
use Carbon\Carbon;

// 今日の日付のCarbonクラスのインスタンスを生成。
$now = Carbon::now('Asia/Tokyo');
//現在時刻をフォーマット
$today = $now->format('Y-m-d');
?>

<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題14-01</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center mt-3">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            TODOリストの期限日で検索
          </div>
          <div class="card-body">
            <form method="post" action="./show.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="search">検索日</label>
                <input type="text" name="date" value="<?= $today ?>" class="form-control" id="date1">
              </div>
              <input type="submit" value="送信" class="btn btn-primary">
            </form>
          </div>
          <div class="card-footer">
            <a href="./">もどる</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
