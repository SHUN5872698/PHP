<?php
//Carbonを使用するためautoload.phpの読み込み
require_once('/Applications/MAMP/vendor/autoload.php');

//ライブラリを使用
use Carbon\Carbon;

//$_POST['date']を変数に代入
$date = $_POST['date'];
//変数を日付型に変換
$date = new Carbon($date);
//$dateをフォーマットして別の変数に代入
$now = $date->format('Y年m月d日');
//$_POST['future']を変数に代入
$future = $_POST['future'];
//$dateを$future日後に変換
$date = $date->addDays($_POST['future']);
//$dateをフォーマット
$date = $date->format('Y年m月d日');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題07-06</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-4">
        <div class="card">
          <div class="card-header">結果発表</div>
          <div class="card-body">
            <p><?= $now ?>の
              <br><?= $future ?>日後は
              <br><?= $date ?>です
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
